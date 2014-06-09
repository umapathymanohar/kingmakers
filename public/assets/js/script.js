
$(document).on('change', '#studentCourseReport', function (e) {

  studentCourseReport = $('#studentCourseReport').val();
  console.log(studentCourseReport);
  if (studentCourseReport.length == 0){

    studentCourseReport = 0;
  }
  $.ajax({
    url: '/kingmakers/public/getstudentcoursereport/' + studentCourseReport,
    type: 'POST',
    dataType: 'json',
    success: function(data) {
      console.log(data);
      var str ="";
      tabletr ="";

      if (data != 0) { 
        for (var i = 0; i < data.length; i++) {

          var formattedDate = data[i].studentDateOfJoining;

          dateString = formattedDate;
          dateStringArray = dateString.split("-");

          d = dateStringArray[0];
          m = dateStringArray[1];
          y = dateStringArray[2];



          convertedDate = d + "/" + m + "/" + y;
          m = parseFloat(m);

          if(data[i].studentPhoto){
            tabletr +='<tr><td>'+data[i].student_id+'</td><td>'+data[i].studentName+'</td><td>'+data[i].studentCourse+'</td><td>'+data[i].batch+'</td><td>'+data[i].studentEmail+'</td><td>'+data[i].studentPhone+'</td><td> <img width="50" src="/kingmakers/public/student_assets/'+data[i].id+'/photo.jpg" alt=""  ></td><td>'+ convertedDate +'</td>';

          }
          else
          {
            tabletr +='<tr><td>'+data[i].student_id+'</td><td>'+data[i].studentName+'</td><td>'+data[i].studentCourse+'</td><td>'+data[i].batch+'</td><td>'+data[i].studentEmail+'</td><td>'+data[i].studentPhone+'</</td><td> <img width="50" src="/kingmakers/public/assets/images/user.png" alt="  "></td><td>'+convertedDate +'</td>';

          }
        }


      }

      $('#studentResults').html(tabletr);


    },

  });
});





$(document).on('click', '.studentdetailspdf', function (e) {

  data = $('.complicatedreport').html();
  data =  encodeURI(data);
  // $(this).attr('href', $(this).attr('href') + '/' + data);

});

$(document).on('change', '#studentBatchReport', function (e) {

  studentBatchReport = $('#studentBatchReport').val();
  console.log(studentBatchReport);
  if (studentBatchReport.length == 0){

    studentBatchReport = 0;
  }
  $.ajax({
    url: '/kingmakers/public/getstudentbatchreport/' + studentBatchReport,
    type: 'POST',
    dataType: 'json',
    success: function(data) {
      console.log(data);
      var str ="";
      tabletr ="";

      if (data != 0) { 
        for (var i = 0; i < data.length; i++) {

          var formattedDate = data[i].studentDateOfJoining;

          dateString = formattedDate;
          dateStringArray = dateString.split("-");

          d = dateStringArray[0];
          m = dateStringArray[1];
          y = dateStringArray[2];



          convertedDate = d + "/" + m + "/" + y;
          m = parseFloat(m);

          if(data[i].studentPhoto){
            tabletr +='<tr><td>'+data[i].student_id+'</td><td>'+data[i].studentName+'</td><td>'+data[i].studentCourse+'</td><td>'+data[i].batch+'</td><td>'+data[i].studentEmail+'</td><td>'+data[i].studentPhone+'</td><td> <img width="50" src="/kingmakers/public/student_assets/'+data[i].id+'/photo.jpg" alt=""  ></td><td>'+ convertedDate +'</td>';

          }
          else
          {
            tabletr +='<tr><td>'+data[i].student_id+'</td><td>'+data[i].studentName+'</td><td>'+data[i].studentCourse+'</td><td>'+data[i].batch+'</td><td>'+data[i].studentEmail+'</td><td>'+data[i].studentPhone+'</</td><td> <img width="50" src="/kingmakers/public/assets/images/user.png" alt="  "></td><td>'+convertedDate +'</td>';

          }
        }


      }

      $('#studentResults').html(tabletr);


    },

  });
});




$(document).on('click', '.delete', function (e) {
  var r=confirm("Are you sure to delete!");
  if (r==false)
  {
    e.preventDefault();
  }

});

$(document).ready(function() {


  if ($('#student_full_id').val() != null){

    console.log($('#student_full_id'));
    collectList();    

  }

  
});



function collectList(){

  student_full_id = $('#student_full_id').val();
  console.log(student_full_id);
  if (student_full_id.length > 6){
   $.ajax({
    url: '/kingmakers/public/getstudentfeesdetails/' + student_full_id,
    type: 'POST',
    dataType: 'json',
    success: function(data) {
      console.log(data);
      var str ="";
      if (data != 0) { 
        tabletr ="";
        $('#studentName').html(data[0].studentName);
        $('#courseFees').html(data[0].courseFees);

        $('#studentCourse').html(data[0].studentCourse);
        
        $('#courseRemainingFees').html(data[0].remainingAmount);

        for (var i = 0; i < data.length; i++) {

        // dateString = data[i].installmentDate;
        // dateStringArray = dateString.split("-");

        // yearValue = dateStringArray[0];
        // monthValue = dateStringArray[1];
        // dayValue = dateStringArray[2];
        // newDate = dayValue + '/' + monthValue + '/' + yearValue;

        newDate =        data[i].installmentDate;
        dis ="";
        danger ="";
        if (data[i].paidStatus == 'Paid') {
          dis = 'disabled="disabled"';
          tabletr +='<tr><td>'+newDate+'</td><td>'+data[i].installmentAmount+'</td><td><a href="/kingmakers/public/pay/'+ data[i].id +'"' +  dis + ' class="btn pay" >'+data[i].paidStatus+'</a> <a target="_blank" href="/kingmakers/public/getPdf/'+ data[i].id +'" class="btn btn-primary">Print</a></td></tr>';

        }
        else
        {
          tabletr +='<tr><td>'+newDate+'</td><td>'+data[i].installmentAmount+'</td><td><a href="/kingmakers/public/pay/'+ data[i].id +'"' +  dis + ' class="btn danger pay" >'+data[i].paidStatus+'</a> </td></tr>';

        }


        
      }

      $('#searchResults').html(tabletr);

    }


  },

});
}

}



$(document).on('click', '.pay', function (e) {

  if ($(this).attr('disabled') == 'disabled'){
    return false;
  }

});













$(document).on('click', '#same-address', function (e) {

  if ($(this).attr('checked') == 'checked'){
    $('#studentPermanentAddressLine1').val($('#studentCommunicationAddressLine1').val());
    $('#studentPermanentAddressLine2').val($('#studentCommunicationAddressLine2').val());
    $('#studentPermanentState').val($('#studentCommunicationState').val());
    $('#studentPermanentCity').val($('#studentCommunicationCity').val());
    $('#studentPermanentPinCode').val($('#studentCommunicationPinCode').val());
  }
  else
  {
    $('#studentPermanentAddressLine1').val('');
    $('#studentPermanentAddressLine2').val('');
    $('#studentPermanentState').val('');
    $('#studentPermanentCity').val('');
    $('#studentPermanentPincode').val('');

  }

});



$('.datepicker').datepicker();








var acceptedTypes = {
  'image/png': true,
  'image/jpeg': true,
  'image/gif': true
};
var allowed_img_width = '';
var allowed_img_height = '';

$(document).on('change', '#studentPhoto', function(e){

  dropInput(e);

});

function dropInput(e) {

  var dt = e.target;
  if (dt.files){
    files = dt.files;
    var i = 0;
    while (i < dt.files.length) {
      var file = dt.files[i];
      createImage(file);

      i = i + 1;

    }
  }
 //   ignoreDrag(e);


   // $('#upload').removeAttr('disabled');
 }


 function createImage(file) {
  console.log(file);
  if (acceptedTypes[file.type] === true) {

    var reader = new FileReader();
    reader.onload = function (e) {
      var img = document.createElement('img');
      img.src = e.target.result;
      setTimeout(function () {
        var upImgwidth = img.width;
        var upImgheight = img.height;
                //check image dimension and height
                if (upImgwidth >= allowed_img_width && upImgheight >= allowed_img_height) {
                  image = $('#preview-photo');
                  image.attr('src', e.target.result);

                } else {
                  err = err + 1;
                  $('#errMessage').removeClass('hide');
                  $('#errMessage').html('Image Height and widht should be ' + allowed_img_width + ' X ' + allowed_img_height + '. Skipped (' + err + ') files');
                }
              }, 1000);
    };
    reader.readAsDataURL(file);
  }
}


$(document).on('change', '#studentCourseCategory_id', function(){
  course_category_id = $(this).val();
  student_id = $('#student_id').val();
  getAvailableCourses(student_id+'~'+course_category_id);
  getSelectedCourses(student_id);

});
function getAvailableCourses(course_category_id){

 $.ajax({

  url: '/kingmakers/public/getavailablecourses/' + course_category_id,
  type: 'POST',
  dataType: 'json',
  success: function(data) {
    console.log(data);
    var str ="";
    if (data != 0) { 

      for (var i = 0; i < data.length; i++) {
        str += '<option value="'+data[i].id+'">'+data[i].courseName+'</option>';
      }

      $('#availableCourses').html(str);
    }

  },
  error: function (xhr, ajaxOptions, thrownError) {
    console.log(xhr.status);
    console.log(thrownError);
  },
});

 
}


function getSelectedCourses(student_id){

 $.ajax({

  url: '/kingmakers/public/getselectedcourses/' + student_id,
  type: 'POST',
  dataType: 'json',
  success: function(data) {

    var str ="";
    if (data != 0) { 





      tablestart='<table class="table table-bordered"><thead><th>Course Name</th><th>Course Fees</th><th>Discount</th><th>Sales Tax</th><th>Fees Payable</th></thead><tbody>';
      tabletr ='';
      coursefees=0;
      for (var i = 0; i < data.length; i++) {
        coursefees += parseFloat(data[i].coursefees);
        tabletr += '<tr><td>'+data[i].courseselectedname+'</td><td>'+data[i].coursefees+'</td><td>0</td><td>0</td><td>'+data[i].coursefees+'</td></tr>';
        str += '<option value="'+data[i].id+'">'+data[i].courseselectedname+'</option>';
      }
      $('#selectedCourses').html(str);
      tableend = '</tbody></table>';
     // $('#discountedFees').html(tablestart + tabletr + tableend);

     $('#studentCourseFees').val(coursefees);
     calculate();

   }


 },
 error: function (xhr, ajaxOptions, thrownError) {
  console.log(xhr.status);
  console.log(thrownError);
},
});


}



$(document).on('keyup', '#studentDiscount', function (e) {
  calculate();
});

function calculate(){
  student_id = $('#student_id').val();
  discountAmount = parseFloat($('#studentDiscount').val());
  $.ajax({

    url: '/kingmakers/public/getselectedcourses/' + student_id,
    type: 'POST',
    dataType: 'json',
    success: function(data) {
      console.log(data.length);
      var str ="";
      if (data != 0) { 

        fees =0;
        for (var i = 0; i < data.length; i++) {
          fees += parseFloat(data[i].coursefees);
        }

        

        tablestart='<table class="table table-bordered"><thead><th>Course Name</th><th>Actual Course Fees</th><th>Fees After Discount</th><th>Discount</th><th>Sales Tax</th><th>Fees Payable</th></thead><tbody>';
        tabletr ='';
        grandAfter =0;
        grandActual =0;
        grandSalesTax =0;
        grandDiscount =0;
        coursefees=0;
        grandTotal =0;
        for (var i = 0; i < data.length; i++) {
          coursefees += parseFloat(data[i].coursefees);

          discount = roundToTwo((data[i].coursefees* discountAmount)/fees);
          if (discount > 0){
            salesTax = roundToTwo((data[i].coursefees *12.36)/100);
            totalFees = parseFloat(data[i].coursefees) + salesTax;
            
            totalFees = totalFees - discount;
            salesTax = roundToTwo((totalFees *12.36)/100);
            coursefees = totalFees- salesTax;
            grandTotal += totalFees;


          }
          else
          {
            salesTax = roundToTwo((data[i].coursefees *12.36)/100);
            totalFees = data[i].coursefees - discount + salesTax;
            grandTotal += totalFees;
            coursefees = data[i].coursefees;
          }
          grandAfter += roundToTwo(parseFloat(coursefees));
          grandActual += roundToTwo(parseFloat(data[i].coursefees));
          grandDiscount += roundToTwo(discount);
          grandSalesTax +=  roundToTwo(salesTax);

          tabletr += '<tr><td>'+data[i].courseselectedname+'</td><td>'+data[i].coursefees+'</td><td>'+roundToTwo(coursefees)+'</td><td>'+roundToTwo(discount)+ '</td><td>'+roundToTwo(salesTax)+'</td><td>'+roundToTwo(totalFees)+'</td></tr>';
        }
        tableend = '<tr><td><strong>Total</strong></td><td>'+grandActual+'</td><td>'+grandAfter+'</td><td>'+grandDiscount+'</td><td>'+ roundToTwo(grandSalesTax) +'</td><td>'+Math.round(grandTotal)+'</td></tr></tbody></table>';
        $('#discountedFees').html(tablestart + tabletr + tableend);
        $('#studentCourseFees').val(Math.round(grandTotal));


      }


    },
    error: function (xhr, ajaxOptions, thrownError) {
      console.log(xhr.status);
      console.log(thrownError);
    },
  });
}
$(document).on('change', '#installments', function (e) {

  installments = parseFloat($('#installments').val());
  installmentAmount = parseFloat($('#installmentAmount').val());
  monthlyInstallmentAmount =  installmentAmount/installments ;
  monthlyInstallmentAmount = Math.round(monthlyInstallmentAmount);
  var formattedDate =  $('#studentDateOfJoining').val();

  dateString = formattedDate;
  dateStringArray = dateString.split("-");

  d = dateStringArray[0];
  m = dateStringArray[1];
  y = dateStringArray[2];



  todayDate = d + "/" + m + "/" + y;
  m = parseFloat(m);
  console.log(m);
  tablestart = '<table class="table table-bordered"><thead><tr><th>Installment Date</th><th>Installment Amount</th></tr></thead><tbody>';
  tabletr="";
  for (var i = 0; i < installments; i++) {
    console.log(m);
    if (m == 12){
      m = 0;
      y = parseFloat(y) + 1;
    }
    m = m + 1;

    installmentDate = d + "/" + m  + "/" + y;
    tabletr += '<tr><td>'+ installmentDate +'</td><td>'+monthlyInstallmentAmount +'</td></tr>';

  };
  tableend='</tbody></table>';
  $('#installmentCuts').html(tablestart+ tabletr+ tableend);

});

function roundToTwo(value) {
  console.log(value);
  console.log(Math.round(value * 100) / 100);
  return(Math.round(value * 100) / 100);

}

$(document).on('keyup', '#initialPayment', function (e) {
  if ($('#initialPayment').val().length == 0){
    $('#initialPayment').val('0');

  }
  $('#installmentAmount').val(parseFloat($('#studentCourseFees').val()) - parseFloat($('#initialPayment').val()) );


});


function buildTable(student_id){

 $.ajax({

  url: '/kingmakers/public/getselectedcourses/' + student_id,
  type: 'POST',
  dataType: 'json',
  success: function(data) {

    var str ="";
    if (data != 0) { 

      for (var i = 0; i < data.length; i++) {
        str += '<option value="'+data[i].courseselected+'">'+data[i].courseselectedname+'</option>';
      }

      $('#selectedCourses').html(str);
    }

  },
  error: function (xhr, ajaxOptions, thrownError) {
    console.log(xhr.status);
    console.log(thrownError);
  },
});

 
}
