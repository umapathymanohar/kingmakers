<html>
<head>
  <title>Kingmakers</title>
  <style type="text/css">

      @page { margin: 100px 50px; }
    #header { position: fixed; left: 0px; top: -100px; right: 0px; height: 80px;  text-align: center; }
    #footer { position: fixed; left: 0px; bottom: -100px; right: 0px; height: 80px}
    #footer .page:after { content: counter(page); }
    </style>
</head>
<body>
  <div id="header">
  
  <table>
      <img width="400" src="http://indicushost.com/kingmakers/public/assets/images/logo.png" alt="">
  </table>

  </div>
    <div id="footer">
    <p class="page">Page </p>
  </div>
 
 <div id="content">


 <table>


<tbody>
  <tr style="background:#eee;">

      
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Date of Joining</th>
                </tr>
             
         

                             <?php $studentregistrations = Studentregistration::all(); ?>
                @if ($studentregistrations->count())
               @foreach ($studentregistrations as $student)

                   <tr>
                      <td width="10%">{{{ $student->student_id }}}</td>
                        <td width="35%">{{{ $student->studentName }}}</td>
                        <td width="20%" >{{{ $student->studentEmail }}}</td>
                        <td width="10%">{{{ $student->studentPhone }}}</td>
                        <td width="10%">{{ date("d/m/Y",strtotime($student->studentDateOfJoining)) }}</td>
                  </tr>
                    @endforeach
              @endif
             
          </tbody>
        </table>
  
</div>
</body>
</html>
