$(document).on('keyup', '#StudentNameReport', function (e) {

  StudentNameReport = $('#StudentNameReport').val();
  console.log(StudentNameReport);
  if (StudentNameReport.length == 0){

    StudentNameReport = 'all';
  }
  $.ajax({
    url: '/kingmakers/public/getstudentnamereport/' + StudentNameReport,
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


//---------------//








$(document).on('keyup', '#StudentIDReport', function (e) {

  StudentIDReport = $('#StudentIDReport').val();
  console.log(StudentIDReport);
  if (StudentIDReport.length == 0){

    StudentIDReport = 0;
  }
  $.ajax({
    url: '/kingmakers/public/getstudentidreport/' + StudentIDReport,
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



$(document).on('keyup', '#student_full_id', function (e) {
  collectList();
});




$(document).on('keyup', '#searchStudents', function (e) {

  searchStudents = $('#searchStudents').val();
  console.log(searchStudents);
  if (searchStudents.length == 0){

    searchStudents = 'all';
  }
  $.ajax({
    url: '/kingmakers/public/getstudentsearchdetails/' + searchStudents,
    type: 'POST',
    dataType: 'json',
    success: function(data) {
      console.log(data);
      var str ="";
      tabletr ="";
d
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
            tabletr +='<tr><td>'+data[i].student_id+'</td><td>'+data[i].studentName+'</td><td>'+data[i].studentEmail+'</td><td>'+data[i].studentPhone+'</td><td> <img width="50" src="/kingmakers/public/student_assets/'+data[i].id+'/photo.jpg" alt=""></td><td>'+ convertedDate +'</td><td><a href="/kingmakers/public/studentregistrations/'+data[i].id+'" title="view" class="btn btn-primary">View</a></td><td><a href="/kingmakers/public/studentregistrations/'+data[i].id+'/edit" title="Edit" class="btn btn-success">Edit</a></td><td><form method="POST" action="/kingmakers/public/studentregistrations/'+data[i].id+'" accept-charset="UTF-8"><input name="_method" type="hidden" value="DELETE"><button type="submit" class="btn btn-danger delete ">Delete</button></form>           </td></tr>';

          }
          else
          {
            tabletr +='<tr><td>'+data[i].student_id+'</td><td>'+data[i].studentName+'</td><td>'+data[i].studentEmail+'</td><td>'+data[i].studentPhone+'</</td><td> <img width="50" src="/kingmakers/public/assets/images/user.png" alt=""></td><td>'+convertedDate +'</td><td><a href="/kingmakers/public/studentregistrations/'+data[i].id+'" title="view" class="btn btn-primary">View</a></td><td><a href="/kingmakers/public/studentregistrations/'+data[i].id+'/edit" title="Edit" class="btn btn-success">Edit</a></td><td><form method="POST" action="/kingmakers/public/studentregistrations/'+data[i].id+'" accept-charset="UTF-8"><input name="_method" type="hidden" value="DELETE"><button type="submit" class="btn btn-danger delete ">Delete</button></form>           </td></tr>';

          }
        }


      }

      $('#studentResults').html(tabletr);


    },

  });
});







$(document).on('keyup', '#searchStudentsID', function (e) {

  searchStudentsID = $('#searchStudentsID').val();
  console.log(searchStudentsID);
  if (searchStudentsID.length == 0){

    searchStudentsID = '0';
  }
  $.ajax({
    url: '/kingmakers/public/getstudentsearchdetailsid/' + searchStudentsID,
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
            tabletr +='<tr><td>'+data[i].student_id+'</td><td>'+data[i].studentName+'</td><td>'+data[i].studentEmail+'</td><td>'+data[i].studentPhone+'</td><td> <img width="50" src="/kingmakers/public/student_assets/'+data[i].id+'/photo.jpg" alt=""></td><td>'+ convertedDate +'</td><td><a href="/kingmakers/public/studentregistrations/'+data[i].id+'" title="view" class="btn btn-primary">View</a></td><td><a href="/kingmakers/public/studentregistrations/'+data[i].id+'/edit" title="Edit" class="btn btn-success">Edit</a></td><td><form method="POST" action="/kingmakers/public/studentregistrations/'+data[i].id+'" accept-charset="UTF-8"><input name="_method" type="hidden" value="DELETE"><button type="submit" class="btn btn-danger delete ">Delete</button></form>           </td></tr>';

          }
          else
          {
            tabletr +='<tr><td>'+data[i].student_id+'</td><td>'+data[i].studentName+'</td><td>'+data[i].studentEmail+'</td><td>'+data[i].studentPhone+'</</td><td> <img width="50" src="/kingmakers/public/assets/images/user.png" alt=""></td><td>'+convertedDate +'</td><td><a href="/kingmakers/public/studentregistrations/'+data[i].id+'" title="view" class="btn btn-primary">View</a></td><td><a href="/kingmakers/public/studentregistrations/'+data[i].id+'/edit" title="Edit" class="btn btn-success">Edit</a></td><td><form method="POST" action="/kingmakers/public/studentregistrations/'+data[i].id+'" accept-charset="UTF-8"><input name="_method" type="hidden" value="DELETE"><button type="submit" class="btn btn-danger delete ">Delete</button></form>           </td></tr>';

          }
        }


      }

      $('#studentResults').html(tabletr);


    },

  });
});




$(document).on('keyup', '#searchFeesStudents', function (e) {

  searchFeesStudents = $('#searchFeesStudents').val();
  console.log(searchFeesStudents);
  if (searchFeesStudents.length == 0){

    searchFeesStudents = 'all';
  }
  $.ajax({
    url: '/kingmakers/public/getstudentsearchfees/' + searchFeesStudents,
    type: 'POST',
    dataType: 'json',
    success: function(data) {
      console.log(data);
      var str ="";
      tabletr ="";

      if (data != 0) { 
        for (var i = 0; i < data.length; i++) {

          tabletr +='<tr> <td>'+data[i].student_id +'</td><td>'+data[i].studentName+'</td><td>'+data[i].studentCourse+'</td><td>'+data[i].courseFees+'</td><td>'+data[i].remainingAmount+'</td> <td><a class="btn btn-warning" href="/kingmakers/public/search/'+data[i].student_id+'" title="View">Pay</a></td></tr>';


        }


      }

      $('#searchStudentsFeesResults').html(tabletr);


    },

  });
});





$(document).on('keyup', '#searchFeesStudentsID', function (e) {

  searchFeesStudentsID = $('#searchFeesStudentsID').val();
  console.log(searchFeesStudentsID);
  if (searchFeesStudentsID.length == 0){

    searchFeesStudentsID = '0';
  }
  $.ajax({
    url: '/kingmakers/public/getstudentsearchfeesid/' + searchFeesStudentsID,
    type: 'POST',
    dataType: 'json',
    success: function(data) {
      console.log(data);
      var str ="";
      tabletr ="";

      if (data != 0) { 
        for (var i = 0; i < data.length; i++) {



          tabletr +='<tr> <td>'+data[i].student_id +'</td><td>'+data[i].studentName+'</td><td>'+data[i].studentCourse+'</td><td>'+data[i].courseFees+'</td><td>'+data[i].remainingAmount+'</td> <td><a class="btn btn-warning" href="/kingmakers/public/search/'+data[i].student_id+'" title="View">Pay</a></td></tr>';

        }


      }

      $('#searchStudentsFeesResults').html(tabletr);


    },

  });
});




$(document).on('keyup', '#searchAssignStudents', function (e) {

  searchAssignStudents = $('#searchAssignStudents').val();
  console.log(searchAssignStudents);
  if (searchAssignStudents.length == 0){

    searchAssignStudents = '0';
  }
  $.ajax({
    url: '/kingmakers/public/getstudentsearchassigndetails/' + searchAssignStudents,
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


          tabletr +='<tr><td>'+data[i].student_id+'</td><td>'+data[i].studentName+'</td><td>'+data[i].studentEmail+'</td><td>'+data[i].studentPhone+'</td><td>'+convertedDate +'</td><td><a href="/kingmakers/public/assigncourses/'+data[i].id+'" title="view" class="btn btn-primary">View</a></td><td><a href="/kingmakers/public/assigncourseseditview/'+data[i].id+'/edit" title="Edit" class="btn btn-success">Edit</a></td></tr>';


        }


      }

      $('#searchAssignStudentsResults').html(tabletr);


    },

  });
});




$(document).on('keyup', '#searchAssignStudentsID', function (e) {

  searchAssignStudentsID = $('#searchAssignStudentsID').val();
  console.log(searchAssignStudentsID);
  if (searchAssignStudentsID.length == 0){

    searchAssignStudentsID = '0';
  }
  $.ajax({
    url: '/kingmakers/public/getstudentsearchassigndetailsid/' + searchAssignStudentsID,
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


          tabletr +='<tr><td>'+data[i].student_id+'</td><td>'+data[i].studentName+'</td><td>'+data[i].studentEmail+'</td><td>'+data[i].studentPhone+'</td><td>'+convertedDate +'</td><td><a href="/kingmakers/public/assigncourses/'+data[i].id+'" title="view" class="btn btn-primary">View</a></td><td><a href="/kingmakers/public/assigncourseseditview/'+data[i].id+'/edit" title="Edit" class="btn btn-success">Edit</a></td></tr>';


        }


      }

      $('#searchAssignStudentsResults').html(tabletr);


    },

  });
});
