$(function () {
  $("#add_member").click(function () {
    
      if ($('tr[data-id=""]').length > 0) {
        $('tr[data-id=""]').find('[name="date"]').focus();
        return false;
      }
      var id1 = $("#userid").val();
      var sheetname = $("#sheetname").val();
      var tr = $("<tr>");
      // $('input[name="billid1"]').val("");
      tr.addClass("py-1 px-2");
      tr.attr("data-id", "");
      $("#form-tbl").prepend(tr);
  
      tr.prepend(
        '<td class="py-1 "  style="display:inline-flex;"><button type="submit" class="bt btn btn-primary  " style="display: inline-table!important; width:50px;  padding:2px!important; border-radius: 25px!important; font-size: 10px!important;" >save</button><button class="bt btn btn-sm btn-dark    py-0" onclick="cancel_button($(this))" type="button" style="display: inline-table!important; width:50px;  padding:3px!important; border-radius: 25px!important; font-size: 10px;">Cancel</button></td>'
      );
  
     tr.prepend(
        '<td  class="p-0 m-0 " name="note" ><input type="file" class="form-control-file" id="exampleFormControlFile1" name="file" id="file"  style=" width:100%;height:100%;margin-left:10%!important;padding: 0!important; text-align:center; "></td>'
     );
      tr.prepend(
        '<td class="p-0 m-0" name="acknowledge"><input type="text" id="acknowledge" name="acknowledge" value="" style=" width:100%;height:100%;margin: 0!important;padding: 0!important; text-align:center; "></td>'
      );
      tr.prepend(
        '<td class="p-0 m-0" name="balance"><input type="number" id="amount" name="amount" value="" style=" width:100%;height:100%;margin: 0!important;padding: 0!important; text-align:center;"></td>'
      );
      tr.prepend(
        '<td class="p-0 m-0"><input type="text" id="describe" name="describe" value="" style=" width:100%;height:100%;margin: 0!important;padding: 0!important;text-align:center; "></td>'
      );
      tr.prepend(
        '<td class="p-0 m-0" name="date" date-id=""><input type="text" id="date" name="date" value="" style=" width:100%;height:100%;margin: 0!important;padding: 0!important; text-align:center; "></td>'
      );
      tr.prepend(
        '<td  name="sheetname" style="display:none;"><input type="hidden" id="sheetname1" name="sheetname1" value="'+sheetname+'"></td>'
      );
      tr.prepend(
        '<td  name="user_id" style="display:none;"><input type="hidden" id="userid1" name="userid1" value="'+id1+'"></td>'
      );
      
  
      tr.find('[name="date"]').focus();
    });
   $(document).on('click','.edit_data',function () {
  
    
      var id = $(this).closest("tr").attr("data-id");
      $('input[name="billid"]').val(id);
      var count_column = $(this).closest("tr").find("td").length;
      $(this)
        .closest("tr")
        .find("td")
        .each(function () {
          if (
            $(this).index() != count_column - 1 &&
            $(this).index() != count_column - 2
          )
            $(this).attr("contenteditable", true);
        });
      $(this).closest("tr").find('[name="date"]').focus();
      $(this)
        .closest("tr")
        .find(".editable")
        .show("fast")
        .css("display", "inline-block");
      $(this).closest("tr").find(".noneditable").hide("fast");
    });
  
    $("#insertrecord").on("submit", function (e) {
      e.preventDefault();
  
      if ($('input[name="billid"]').val() == "") {
        $.ajax({
          url: "./api.php?action=add",
  
          method: "POST",
          dataType: "json",
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          error: (err) => {
            alert("An error occured while saving the records");
            console.log(err);
          },
          success: function (resp) {
            if (resp.status == "success") {
              alert(resp.msg);
              location.reload();
            } else {
              alert(resp.msg);
              console.log(err);
            }
          },
        });
      } else {
        var id = $('input[name="billid"]').val();
  
        var data = {};
        // check fields promise
        var check_fields = new Promise(function (resolve, reject) {
          data["billid"] = id;
          $("td[contenteditable]").each(function () {
            data[$(this).attr("name")] = $(this).text();
            if (data[$(this).attr("name")] == "") {
              alert("All fields are required.");
              resolve(false);
              return false;
            }
          });
          resolve(true);
        });
       
        check_fields.then(function (resp) {
          if (!resp) return false;
          // validate email
  
          if (!date(data["date"])) {
            alert("Please Enter Correct Date.");
            $('[name="date"][contenteditable]')
              .addClass("bg-danger text-light bg-opacity-90")
              .focus();
            return false;
          } else {
            $('[name="date"][contenteditable]').removeClass(
              "bg-danger text-light bg-opacity-90"
            );
          }
          // validate contact #
          if (!isContact(data["balance"])) {
            alert("only Numeric Value Allow in Balance.");
            $('[name="balance"][contenteditable]')
              .addClass("bg-danger text-light bg-opacity-20 ")
              .focus();
            return false;
          } else {
            $('[name="balance"][contenteditable]').removeClass(
              "bg-danger text-light  bg-opacity-20"
            );
          }
        
        $.ajax({
          url: "./api.php?action=save",
          method: "POST",
          data: data,
          dataType: "json",
          error: (err) => {
            alert("An error occured while saving the record");
            console.log(err);
          },
          success: function (resp) {
            if (!!resp.status && resp.status == "success") {
              alert(resp.msg);
              location.reload();
            } else {
              alert(resp.msg);
            }
          },
        });
      });
      }
    });
  
    // Delete Row
     $(document).on('click','.delete_data',function () {
      var billid = $(this).closest("tr").attr("data-id");
      var name = $(this).closest("tr").find("[name='date']").text();
      var _conf = confirm('Are you sure to delete "' + name + '" from the list?');
      if (_conf == true) {
        $.ajax({
          url: "api.php?action=delete",
          method: "POST",
          data: { billid: billid },
          dataType: "json",
          error: (err) => {
            alert("An error occured while deleting the data");
            console.log(err);
          },
          success: function (resp) {
            if (resp.status == "success") {
              alert(name + " is successfully deleted from the list.");
              location.reload();
            } else {
              alert(resp.msg);
              console.log(err);
            }
          },
        });
      }
    });
   
  $("#select").on('change', function () {
      var selection = $(this).val();
      var id2 = $("#userid").val();
      var sheetname1 = $("#sheetname").val();
      $.ajax({
        type: "POST",
        url: "expense.php",
  
        data: { selection: selection,
                userid : id2,
                sheetname22: sheetname1},
        
        error: (err) => {
          alert("An error occured while changing the data");
          console.log(err);
        },
        success: function (data) {
          $("#form-tbl").empty();
       $("#form-tbl").html(data);
       alert("Data Changed Successfully");
        
       
         
  
        },
      });
    });
  $('#form-tbl').DataTable({
        searching:true,
        numbering:false,
        lengthChange:false,
        paging:false,
        info : false,
        ordering : false
        
      });
  
  });
  
  //date Validation Function
  window.date = function (date) {
    var regex = /^([1-9]|0[1-9]|[12][0-9]|3[0-1])\/([1-9]|0[1-9]|1[0-2])\/\d{4}$/;
    if (!regex.test(date)) {
      return false;
    } else {
      return true;
    }
  };
  //Contact Number Validation Function
  window.isContact = function (balance) {
    return $.isNumeric(balance);
  };
  
  // removing table row when cancel button triggered clicked
  window.cancel_button = function (_this) {
    if (_this.closest("tr").attr("data-id") == "") {
      _this.closest("tr").remove();
    } else {
      $('input[name="billid"]').val("");
      _this
        .closest("tr")
        .find("td")
        .each(function () {
          $(this).removeAttr("contenteditable");
        });
      _this.closest("tr").find(".editable").hide("fast");
      _this.closest("tr").find(".noneditable").show("fast");
    }
  };
  