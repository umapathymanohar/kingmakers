@extends('layouts.scaffold')

@section('main')


<div class="row-fluid">
  <div class="span12">
    <ul class="breadcrumb">
      <li><a href="{{URL::route('studentregistrations.index')}}">Student Master</a> &rsaquo; </li>
      <li>Student Registration</li>
    </ul>
 
  </div>
</div>
<div class="row">
{{ Form::model($studentregistration, array('method' => 'PATCH', 'files' => 'true', 'class' => 'form-horizontal', 'route' => array('studentregistrations.update', $studentregistration->id))) }}

<div class="span9">

 <fieldset>



  <div class="box gray-box">
   <legend>
    Personal Details
  </legend>





  <div class="control-group">
    <label class="control-label">Student Name</label>
    <div class="controls docs-input-sizes">

      <input type="text" placeholder="" name="studentName" id="studentName" value="{{$studentregistration->studentName}}"  class="span4"> <span class="error"> *</span>
{{ $errors->first('studentName', 'Please enter students name') }}

    </div>

  </div>

          <div class="control-group hide">
      <label class="control-label">Student ID</label>
      <div class="controls docs-input-sizes">
        <input type="text" placeholder="" name="student_id" id="student_id" value="{{$studentregistration->student_id}}" class="span2"><span class="error"> *</span>
{{ $errors->first('student_id', 'Please enter students ID') }}
      </div>

    </div>


  <div class="control-group">
    <label class="control-label">Father's Name</label>
    <div class="controls docs-input-sizes">
      <input type="text" placeholder="" name="studentFathersName" id="studentFathersName" value="{{$studentregistration->studentFathersName}}" class="span4">

    </div>

  </div>
  <div class="control-group">
    <label class="control-label">Date of Birth</label>
    <div class="controls docs-input-sizes">
    <input name="studentDateOfBirth" data-date="12-02-2012" data-date-format="dd-mm-yyyy" id="studentDateOfBirth" class="datepicker" size="16" type="text" value="{{$studentregistration->studentDateOfBirth}}"><span class="error"> *</span>
         {{ $errors->first('studentDateOfBirth', 'Please enter students Date of Birth') }}  
    

    </div>

  </div>

    <div class="control-group">
    <label class="control-label">Date of Joining</label>
    <div class="controls docs-input-sizes">
    <input name="studentDateOfJoining" data-date="12-02-2012" data-date-format="dd-mm-yyyy" id="studentDateOfJoining" class="datepicker" size="16" type="text" value="{{$studentregistration->studentDateOfJoining}}"><span class="error"> *</span>
           {{ $errors->first('studentDateOfJoining', 'Please enter students Date of Joining') }}  


    </div>

  </div>
    <div class="control-group">
    <label class="control-label">Community</label>
    <div class="controls docs-input-sizes">

<select name="studentCommunity" id="studentCommunity" class="span4"><span class="error"> *</span>
<option value="{{$studentregistration->studentCommunity}}">  {{$studentregistration->studentCommunity}} </option> 
<option value="BC">  BC </option>
<option  value="OBC">  OBC </option>
<option  value="FC">  FC </option>
<option  value="SC">  SC </option>
<option  value="ST">  ST </option>
<option  value="Others">  Others </option>
</select>

   <span class="error"> *</span>
  {{ $errors->first('studentCommunity', 'Please enter students Community') }}  

    </div>

  </div>

  <div class="control-group">
      <label class="control-label">Educational Qualification</label>
      <div class="controls docs-input-sizes">
        <input type="text" placeholder="" name="studentEduQuali" id="studentEduQuali" class="span4">

           </div>

    </div>

  <div class="control-group">
    <label class="control-label">E-Mail</label>
    <div class="controls docs-input-sizes">
      <input type="text" placeholder="" name="studentEmail" id="studentEmail" value="{{$studentregistration->studentEmail}}" class="span4"><span class="error"> *</span>
            {{ $errors->first('studentEmail', 'Please enter students Email')}}
    </div>

  </div>
  <div class="control-group">
    <label class="control-label">Telephone</label>
    <div class="controls docs-input-sizes">
      <input type="text" placeholder="" name="studentPhone" id="studentPhone" value="{{$studentregistration->studentPhone}}" class="span4"><span class="error"> *</span>
      {{ $errors->first('studentPhone', 'Please enter students Phone')}}
    </div>

  </div>
</div>

<div class="box gray-box">
  <legend>
    Communication Address
  </legend>
  <div class="control-group">
    <label class="control-label">Street Name</label>
    <div class="controls docs-input-sizes">
      <input type="text" placeholder="" name="studentCommunicationAddressLine1" id="studentCommunicationAddressLine1" value="{{$studentregistration->studentCommunicationAddressLine1}}" class="span4">
    </div>

  </div>
  <div class="control-group">
    <label class="control-label">Area</label>
    <div class="controls docs-input-sizes">
      <input type="text" placeholder="" name="studentCommunicationAddressLine2" id="studentCommunicationAddressLine2" value="{{$studentregistration->studentCommunicationAddressLine2}}" class="span4">
    </div>

  </div>
  <div class="control-group">
    <label class="control-label" for="select01">City</label>
    <div class="controls">
      <input type="text" placeholder="" name="studentCommunicationCity" id="studentCommunicationCity" value="{{$studentregistration->studentCommunicationCity}}" class="span4">
    </div>

  </div>


  <div class="control-group">
    <label class="control-label" for="select01">State</label>
    <div class="controls">
         <input type="text" placeholder="" name="studentCommunicationState" id="studentCommunicationState" class="span4" value="{{$studentregistration->studentCommunicationState}}" >

    </div>

  </div>

  <div class="control-group">
    <label class="control-label">ZIP</label>
    <div class="controls docs-input-sizes">
      <input type="text" name="studentCommunicationPinCode" id="studentCommunicationPinCode" value="{{$studentregistration->studentCommunicationPinCode}}" placeholder="" class="span1">


    </div>

  </div>
</div>
<p><input id="same-address" type="checkbox"> Same as Communication Address</p>
  
<div class="box gray-box">

  <legend>
    Permanent Address
  </legend>
  <div class="control-group">
    <label class="control-label">Street Name</label>
    <div class="controls docs-input-sizes">
      <input type="text" placeholder="" name="studentPermanentAddressLine1" id="studentPermanentAddressLine1" value="{{$studentregistration->studentPermanentAddressLine1}}" class="span4">
    </div>

  </div>
  <div class="control-group">
    <label class="control-label">Area</label>
    <div class="controls docs-input-sizes">
      <input type="text" placeholder="" name="studentPermanentAddressLine2" id="studentPermanentAddressLine2" value="{{$studentregistration->studentPermanentAddressLine2}}" class="span4">
    </div>

  </div>
  <div class="control-group">
    <label class="control-label" for="select01">City</label>
    <div class="controls">
      <input type="text" placeholder="" name="studentPermanentCity" id="studentPermanentCity" value="{{$studentregistration->studentPermanentCity}}" class="span4">
    </div>

  </div>


  <div class="control-group">
    <label class="control-label" for="select01">State</label>
    <div class="controls">
          <input type="text" placeholder="" name="studentPermanentState" id="studentPermanentState" class="span4" value="{{$studentregistration->studentPermanentState}}" >

    </div>

  </div>

  <div class="control-group">
    <label class="control-label">ZIP</label>
    <div class="controls docs-input-sizes">
      <input type="text" name="studentPermanentPinCode" id="studentPermanentPinCode" value="{{$studentregistration->studentPermanentPinCode}}" placeholder="" class="span1">


    </div>

  </div>
</div>



    <div class="control-group">
       <button style="margin-right:30px;" type="submit" class="btn  btn-large btn-success span2 pull-right" value="Submit">Save</button>
    </div>

</fieldset>
</div>

<div class="span3">

  <fieldset>



    <div class="box gray-box">
     <legend>
      Photo
    </legend>
    
    @if ($studentregistration->studentPhoto)

              <img width="210" id="preview-photo"src="/kingmakers/public/student_assets/{{{ $studentregistration->id }}}/photo.jpg" alt="">
                  @else
<img width="210" id="preview-photo" src="/kingmakers/public/assets/images/user.png" alt="">
                  @endif

          <div>
          <input style="width:185px;" name="studentPhoto" type="file" id="studentPhoto">
          </div>
          
    </div>
    </fieldset>
</div>






</div></form>
</div>




@stop


