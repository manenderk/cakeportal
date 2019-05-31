<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Candidate $candidate
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="page-title">CANDIDATE
            <span class="pull-right short-ico">
                <a
                    href="<?php echo $_SERVER["HTTP_REFERER"]; ?>">
                    <i class="fa fa-hand-o-left fa-2x" title="Click to go back" data-toggle="tooltip"
                        data-placement="bottom"></i> Go Back
                </a>
                <a id="cancelBtn" title="Cancel">
                    <i class="cursor-pointer fa fa-close fa-2x" title="Click to close this page" data-toggle="tooltip"
                        data-placement="bottom"></i> Close
                </a>
            </span>
        </div>
    </div>


</div>


<?php
$skill = [];
$skillArr = [];
foreach ($skill as $skl) {
    $skillArr[] = "'$skl->name'";
}
$skillDataString = implode(',', $skillArr);
for ($d=0;$d<=30;$d++) {
    $expArr[] = $d;
}
?>
<div class="panel bg-gray-lighter">
    <?=$this->Form->create($candidate, array('id'=>'CandidateForm','type'=>'file','autocomplete'=>'Off')); ?>
    <div class="panel-body">
        <ul class="timeline">
            <li data-datetime="Basic Information" class="timeline-separator"></li>
            <!-- START timeline item-->
            <li>
                <div class="timeline-badge primary">
                    <em class="fa fa-user"></em>
                </div>
                <div class="timeline-panel animated slideInLeft">
                    <div class="popover left">
                        <div class="arrow"></div>
                        <div class="popover-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <p class="label-new">Login Name</p>
                                        <?php echo $this->Form->control('email', ['label'=>false, 'placeholder'=>'Login Name','class'=>'form-control','readonly'=>'readonly']);?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <p class="label-new">Salutation</p>
                                        <?php echo $this->Form->control('salutation', ['label'=>false, 'class'=>'form-control','options'=>array('Mr.'=>'Mr.', 'Mrs.'=>'Mrs.', 'Miss'=>'Miss', 'Dr.'=>'Dr.', 'Ms.'=>'Ms.')]);?>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <p class="label-new"><span class="text-danger">*</span>First Name</p>
                                        <?php echo $this->Form->control('candidate_first_name', ['label'=>false, 'placeholder'=>'Candidate First Name','class'=>'form-control']);?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p class="label-new">Middle Name</p>
                                        <?php echo $this->Form->control('candidate_middle_name', ['label'=>false, 'placeholder'=>'Candidate Middle Name','class'=>'form-control']);?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p class="label-new"><span class="text-danger">*</span>Candidate Last Name</p>
                                        <?php echo $this->Form->control('candidate_last_name', ['label'=>false, 'placeholder'=>'Candidate Last Name','class'=>'form-control']);?>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <p class="label-new"><span class="text-danger">*</span> Country code</p>
                                        <?php echo $this->Form->control('area_code1', ['label'=>false, 'empty'=>'Code','options'=>array('001'=>'001','0091'=>'0091'),'class'=>'form-control']);?>

                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <p class="label-new">
                                            <span class="text-danger">*</span>Mobile Number</p>
                                        <?php echo $this->Form->control('candidate_phone', ['label'=>false, 'placeholder'=>'Max 12 digits  ','maxlength'=>'12','class'=>'form-control']);?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

            <!-- END timeline item-->
            <!-- START timeline item-->
            <li class="timeline-inverted">
                <div class="timeline-panel animated slideInRight">
                    <div class="popover right">
                        <div class="arrow"></div>
                        <div class="popover-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <p class="label-new"><span class="text-danger">*</span>Personal Email</p>
                                        <?php echo $this->Form->control('candidate_email', ['label'=>false, 'placeholder'=>'Candidate Email','class'=>'form-control']);?>
                                        <span id='message'></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <p class="label-new">Alternate Email</p>
                                        <?php echo $this->Form->control('candidate_alternate_email', ['label'=>false, 'placeholder'=>'Work Email','class'=>'form-control']);?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p class="label-new"> <span class="text-danger">*</span>Nationality</p>
                                        <?php echo $this->Form->control('nationality', ['label'=>false,'placeholder'=>'Nationality','class'=>'form-control']);?>
                                        <input type="text" name="nationality_fake" id="nationality_fake" class="hidden"
                                            autocomplete="off" style="display: none;">
                                        <input type="password" name="ssn_no_fake" id="ssn_no_fake" class="hidden"
                                            autocomplete="off" style="display: none;">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p class="label-new">
                                            <span class="text-danger">*</span>Date of Birth</p>
                                        <?php echo $this->Form->control('dob', array('type' => 'text','label'=>false, 'placeholder'=>'Month-Date','class'=>'form-control'));?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li>

                <div class="timeline-panel animated slideInLeft">
                    <div class="popover left">
                        <div class="arrow"></div>
                        <div class="popover-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p class="label-new">Gender</p>
                                        <?php echo $this->Form->control('gender', ['label' => false, 'placeholder'=>'','options'=>array('Male'=>'Male','Female'=>'Female'),'class'=>'form-control']);?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p class="label-new">SSN No.</p>
                                        <?php echo $this->Form->control('ssn_no', ['type'=>'password', 'label' => false, 'placeholder'=>'Last 4 Digits only','maxlength'=>'4','class'=>'form-control']);?>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <p class="label-new">Country Code</p>
                                        <?php echo $this->Form->control('area_code2', ['label'=>false, 'empty'=>'Code','options'=>array('001'=>'001','0091'=>'0091'),'class'=>'form-control']);?>

                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <p class="label-new">Alternate Number</p>
                                        <?php echo $this->Form->control('contact_no_alternate', ['label'=>false, 'type'=>'text', 'placeholder'=>'Max 12 digits','maxlength'=>'12','class'=>'form-control']);?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-badge yellow">
                    <em class="fa fa-photo"></em>
                </div>
                <div class="timeline-panel animated slideInRight">
                    <div class="popover right">
                        <div class="arrow"></div>
                        <div class="popover-content">
                            <p class="label-new">Candidate Profile Picture</p>
                            <div class="panel widget">
                                <img id="blah" src="#" alt="" height="150" />
                                <?php echo $this->Form->control('profile_pic', array('type' => 'file', 'label' => false, 'class'=>'img-responsive'));?>
                                <span id="show-picture"></span>
                            </div>

                        </div>
                    </div>
                </div>
            </li>
            <!-- END timeline item-->
            <li data-datetime="Address Information" class="timeline-separator"></li>
            <li>
                <div class="timeline-badge danger">
                    <em class="fa fa-map-marker"></em>
                </div>
                <div class="timeline-panel animated slideInLeft">
                    <div class="popover left">
                        <div class="arrow"></div>
                        <div class="popover-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <p class="label-new">Street</p>
                                        <?php echo $this->Form->control('candidate_street', ['label'=>false, 'placeholder'=>'Street','class'=>'form-control']);?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p class="label-new"><span class="text-danger">*</span>Country</p>
                                        <?php echo $this->Form->control('candidate_country', ['class' => 'chosen-select','options' => $countries, 'empty' => true,'label'=>false,'empty'=>'Select Country']);?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p class="label-new"><span class="text-danger">*</span>State</p>
                                        <?php echo $this->Form->control('candidate_state', ['class' => 'form-control ng-pristine ng-invalid ng-invalid-required ng-touched', 'options' => $states, 'empty'=>'Select State','label'=>false]);?>
                                        <span id="load-state"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="timeline-inverted">

                <div class="timeline-panel animated slideInRight">
                    <div class="popover right">
                        <div class="arrow"></div>

                        <div class="popover-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p class="label-new"><span class="text-danger">*</span>City</p>
                                        <?php echo $this->Form->control('candidate_city', ['class' => 'form-control', 'options' => '', 'empty'=>false,'label'=>false]);?>
                                        <span id="load-city"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p class="label-new"><span class="text-danger">*</span>Zipcode</p>
                                        <?php echo $this->Form->control('candidate_zipcode', ['class' => 'form-control', 'options' => '', 'empty'=>false,'label'=>false]);?>
                                        <span id="load-zipcode"></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </li>
            <li data-datetime="Professional Information" class="timeline-separator"></li>
            <!-- START timeline item-->
            <li>
                <div class="timeline-badge info">
                    <em class="fa fa-cogs"></em>
                </div>
                <div class="timeline-panel">
                    <div class="popover left animated slideInLeft">
                        <div class="arrow"></div>
                        <div class="popover-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <p class="label-new"><span class="text-danger">*</span>Key Skills</p>
                                        <?php echo $this->Form->control('key_skills', ['type'=>'text','class' => 'form-group','label' => false,'tabindex'=>'9','class'=>'form-control']);?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <p class="label-new">Specialization</p>
                                        <?php echo $this->Form->control('specialization', ['label'=>false,'class'=>'form-control']);?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p class="label-new">Current Job Title</p>
                                        <?php echo $this->Form->control('current_job_title', ['label'=>false, 'placeholder'=>'Current Job Title','class'=>'form-control']);?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p class="label-new">Current Location</p>
                                        <?php echo $this->Form->control('current_location', ['label'=>false, 'placeholder'=>'Current Location','class'=>'form-control']);?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <p class="label-new">Current Employer</p>
                                        <?php echo $this->Form->control('current_employer', ['label'=>false, 'placeholder'=>'Current Employer','class'=>'form-control']);?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <!-- END timeline item-->
            <!-- START timeline item-->
            <li class="timeline-inverted">
                <div class="timeline-badge purple">
                    <em class="fa fa-key"></em>
                </div>
                <div class="timeline-panel animated slideInRight">
                    <div class="popover right">
                        <div class="arrow"></div>
                        <div class="popover-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p class="label-new">Total Relevant Experience (in years)</p>
                                        <?php echo $this->Form->control('total_it_experience', ['label'=>false,'placeholder'=>'Total Experience','options'=>$expArr,'class'=>'chosen-select']);?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p class="label-new">Total Overall Experience (in years)</p>
                                        <?php echo $this->Form->control('total_overall_experience', ['label'=>false,'placeholder'=>'Total Overall Experience','options'=>$expArr,'class'=>'chosen-select']);?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p class="label-new">Skype ID</p>
                                        <?php echo $this->Form->control('skypeid', ['label'=>false, 'placeholder'=>'Skype ID','class'=>'form-control']);?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p class="label-new">Twitter ID</p>
                                        <?php echo $this->Form->control('twitterid', ['label'=>false, 'placeholder'=>'Twitter ID','class'=>'form-control']);?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <p class="label-new">Code</p>
                                        <?php echo $this->Form->control('current_salary_code', ['class' => 'form-control', 'options' => $currencies,'empty'=>true,'label'=>false]);?>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <p class="label-new">Current Salary</p>
                                        <?php echo $this->Form->control('current_salary', ['label'=>false, 'placeholder'=>'Current Salary','class'=>'form-control']);?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <p class="label-new">Code</p>
                                        <?php echo $this->Form->control('expected_salary_code', ['class' => 'form-control', 'options' => $currencies,'empty'=>true,'label'=>false]);?>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <p class="label-new">Expected Salary</p>
                                        <?php echo $this->Form->control('expected_salary', ['label'=>false, 'placeholder'=>'Expected Salary','class'=>'form-control']);?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <!-- END timeline item-->
            <li data-datetime="Education" class="timeline-separator"></li>
            <!-- START timeline item-->
            <li>
                <div class="timeline-badge success">
                    <em class="fa fa-book"></em>
                </div>
                <div class="timeline-panel">
                    <div class="popover left animated slideInLeft">

                        <div class="arrow"></div>
                        <div class="popover-content ">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p class="label-new">Qualification</p>
                                        <?php echo $this->Form->control('education_degree[]', ['id'=>'education_degree0','label'=>false,'placeholder'=>'Education Degree','class'=>'form-control']);?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p class="label-new">Course Type</p>
                                        <?php echo $this->Form->control('course_type[]', ['id'=>'course_type0','options' => array('Part Time'=>'Part Time','Full Time'=>'Full Time'), 'empty'=>'Cource Type', 'label' => false,'class'=>'chosen-select']);?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p class="label-new">Grade</p>
                                        <?php echo $this->Form->control('grade[]', ['id'=>'grade0','label'=>false,'placeholder'=>'Grade','options'=>array(''=>'','A'=>'A','B'=>'B','C'=>'C','D'=>'D','E'=>'E'),'class'=>'chosen-select']);?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p class="label-new">Passing Year</p>
                                        <?php
                    for ($year=2019;$year>1941;$year--) {
                        $option[] = $year;
                    }
                    $option = array_combine($option, $option);
?>
                                        <?php echo $this->Form->control('passing_year[]', array('id'=>'passing_year0','options' => $option,'empty' => '--Passing Year--','label'=>false,'class'=>'chosen-select'));?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <p class="label-new">Institute</p>
                                        <?php echo $this->Form->control('university_name[]', ['id'=>'university_name0','label'=>false, 'placeholder'=>'University or College','class'=>'form-control']);?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="popover-content" id="panel2" style="height: auto!important;">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p class="label-new">Qualification</p>
                                        <?php echo $this->Form->control('education_degree[]', ['id'=>'education_degree0','label'=>false,'placeholder'=>'Education Degree','class'=>'form-control']);?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p class="label-new">Course Type</p>
                                        <?php echo $this->Form->control('course_type[]', ['id'=>'course_type0','options' => array('Part Time'=>'Part Time','Full Time'=>'Full Time'), 'empty'=>'Cource Type', 'label' => false,'class'=>'chosen-select']);?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p class="label-new">Grade</p>
                                        <?php echo $this->Form->control('grade[]', ['id'=>'grade0','label'=>false,'placeholder'=>'Grade','options'=>array(''=>'','A'=>'A','B'=>'B','C'=>'C','D'=>'D','E'=>'E'),'class'=>'chosen-select']);?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p class="label-new">Passing Year</p>
                                        <?php for ($year=2019;$year>1941;$year--) {
    $option[] = $year;
}
                                    $option = array_combine($option, $option);
                                    ?>
                                        <?php echo $this->Form->control('passing_year[]', array('id'=>'passing_year0','options' => $option,'empty' => '--Passing Year--','label'=>false,'class'=>'chosen-select'));?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <p class="label-new">Institute</p>
                                        <?php echo $this->Form->control('university_name[]', ['id'=>'university_name0','label'=>false, 'placeholder'=>'University','class'=>'form-control']);?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p class="label-new">Qualification</p>
                                        <?php echo $this->Form->control('education_degree[]', ['id'=>'education_degree0','label'=>false,'placeholder'=>'Education Degree','class'=>'form-control']);?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p class="label-new">Course Type</p>
                                        <?php echo $this->Form->control('course_type[]', ['id'=>'course_type0','options' => array('Part Time'=>'Part Time','Full Time'=>'Full Time'), 'empty'=>'Cource Type', 'label' => false,'class'=>'chosen-select']);?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p class="label-new">Grade</p>
                                        <?php echo $this->Form->control('grade[]', ['id'=>'grade0','label'=>false,'placeholder'=>'Grade','options'=>array(''=>'','A'=>'A','B'=>'B','C'=>'C','D'=>'D','E'=>'E'),'class'=>'chosen-select']);?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p class="label-new">Passing Year</p>
                                        <?php
                    for ($year=2019;$year>1941;$year--) {
                        $option[] = $year;
                    }
                    $option = array_combine($option, $option);
                    ?>
                                        <?php echo $this->Form->control('passing_year[]', array('id'=>'passing_year0','options' => $option,'empty' => '--Passing Year--','label'=>false,'class'=>'chosen-select'));?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <p class="label-new">Institute</p>
                                        <?php echo $this->Form->control('university_name[]', ['id'=>'university_name0','label'=>false, 'placeholder'=>'University','class'=>'form-control']);?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href='javascript:void();' id="add-more">
                            <button type="button" class="btn btn-labeled btn-success"
                                style="margin-left: 1.5%;margin-bottom: 1%"><span class="btn-label">
                                    <i class="fa fa-plus"></i>
                                </span>Add More Education</button>
                        </a>
                    </div>
                </div>
            </li>
            <!-- START timeline item-->
            <li class="timeline-inverted">
                <div class="timeline-badge pink">
                    <em class="fa fa-file"></em>
                </div>
                <div class="timeline-panel animated slideInRight">
                    <div class="popover right">

                        <div class="arrow"></div>
                        <div class="popover-content">
                            <p class="label-new">Attachments</p>
                            <div class="form-group">
                                <p class="col-lg-12 label-new"><span class="text-danger">*</span>Resume</p>
                                <?php echo $this->Form->control('resume', array('type' => 'file', 'label' => false,'class'=>''));?>
                            </div>
                            <div class="form-group">
                                <p class="col-lg-12 label-new">Cover Letter</p>
                                <?php echo $this->Form->control('cover_letter', array('type' => 'file', 'label' => false,'class'=>''));?>
                            </div>
                            <div class="form-group">
                                <p class="col-lg-12 label-new">Other Files</p>
                                <?php echo $this->Form->control('other_files', array('type' => 'file', 'label' => false,'class'=>''));?>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li data-datetime="Candidate Description" class="timeline-separator"></li>
            <li>
                <div class="timeline-badge primary">
                    <em class="fa fa-arrow-down"></em>
                </div>
            </li>
        </ul>
    </div>
    <div class="panel-body animated slideInDown">
        <?php echo $this->Form->control('candidate_description', array('label'=>false,  'type' => 'textarea','class'=>'ckeditor'));?>
    </div>
    <div class="panel-body">
        <button class="btn btn-labeled btn-inverse" type="submit" id="submitBtn"
            title="Click here to save this candidate details !!!!" data-toggle="tooltip" data-placement="bottom">
            <span class="btn-label">
                <i class="fa fa-save faa-tada "></i>
            </span>Save Candidate</button>
        <span id="valid-msg"></span>
    </div>
    <?=$this->Form->end() ?>
</div>
<?= $this->Html->script('jquery_ui') ?>
<?= $this->Html->css('jquery.tag-editor.css') ?>
<?= $this->Html->css('jquery_ui.css') ?>
<?= $this->Html->script('jquery.caret.min') ?>
<?= $this->Html->script('jquery.tag-editor') ?>
<?= $this->Html->script('jquery.maskedinput.min') ?>
<?= $this->Html->script('ckeditor/ckeditor');?>
<?= $this->Html->script('bootstrap');?>
<?= $this->Html->css('chosen.css') ?>
<?= $this->Html->script('chosen.jquery');?>
<?= $this->Html->script('demo-wizard');?>
<?= $this->Html->script('jquery.steps');?>
<?= $this->Html->script('jquery.validate');?>
<?= $this->Html->css('vendor/animate.css/animate.min.css') ?>
<!--<?= $this->Html->script('jquery');?>-->
<script>
    var config = {
        '.chosen-select': {},
        '.chosen-select-deselect': {
            allow_single_deselect: true
        },
        '.chosen-select-no-single': {
            disable_search_threshold: 10
        },
        '.chosen-select-no-results': {
            no_results_text: 'Oops, nothing found!'
        },
        '.chosen-select-width': {
            width: "95%"
        }
    }
    for (var selector in config) {
        $(selector).chosen(config[selector]);
    }
    $("#cancelBtn").click(function() {
        location.href =
            "<?php echo $this->Url->build(["controller" => "candidates","action" => "index"]);?>";
    });
</script>
<script>
    $(document).ready(function() {
        $('#blah').hide();
        $('#panel2').hide();
        $("#dob").mask("99-99", {
            placeholder: "mm-dd"
        });
        //$("#course-end-date").mask("99/99/9999",{placeholder:"dd/mm/yyyy"});
        //$("#course-start-date").mask("99/99/9999",{placeholder:"dd/mm/yyyy"});
        //$( "#dob" ).datepicker({ dateFormat: 'yy-m-d' });
        //$( "#availability-from" ).datepicker({ dateFormat: 'yy-m-d' });
        //$( "#course-end-date" ).datepicker({ dateFormat: 'yy-m-d' });
        //$( "#course-start-date" ).datepicker({ dateFormat: 'yy-m-d' });

        $("#zip").hide();
        $("#candidate-zipcode").blur(function() {
            var zip = $("#candidate-zipcode").val();
            if (isNaN(zip)) {
                $("#zip").show();
                $("#zip").text('Invalid Zipcode');
            } else {
                if (zip.length > 6 || zip.length < 5) {
                    $("#zip").show();
                    $("#zip").text('Invalid Zipcode');
                } else {
                    $("#zip").hide();
                }
            }
        });

        $("#candidate-email").blur(function() {
            var candidate_email = $("#candidate-email").val();
            var dataString = 'candidate_email=' + candidate_email;

            // AJAX Code To Submit Form.
            var url = "check_candidate_email";
            $('#message').show();
            $('#message').html(
                "<img src='/img/loading.gif'>&nbsp;&nbsp;<span style='font-weight: bold;font-size:12px;'>Checking login name validity....</span>"
                );
            $.ajax({
                type: "POST",
                url: "check_candidate_email",
                data: dataString,
                cache: false,
                success: function(result) {
                    var obj = $.parseJSON(result);
                    if (obj.success == 'true') {
                        $('#message').show();
                        $('#message').html(
                            'Primary Email already exist! Please try another');
                        $('#message').css("color", "red");
                        $('#submitBtn').attr('disabled', true);
                    }
                    if (obj.success == 'false') {
                        $('#message').hide();
                        $('#message').html('');
                        $('#submitBtn').attr('disabled', false);
                    }
                }
            });
            return false;
        });

        // prevent double click form submission
        $('#CandidateForm').submit(function() {
            $('#submitBtn').attr("disabled", true);
            $('#valid-msg').html('Wait...');

        });
    });

    $('#add-more').click(function() {
        $('#panel2').slideToggle('slow', function() {
            if ($(this).is(':visible')) {
                $('#add-more').text('Remove Other Qualification');
            } else {
                $('#add-more').text('Other Qualification');
            }
        });
    });

    $("#candidate-country").change(function() {
        $('#load-state').html(
            "<img src='/img/loading.gif'>&nbsp;&nbsp;<span style='font-size:12px;'>Getting states...</span>"
            );
        var val = $('#candidate-country').val();
        $.ajax({
            type: "POST",
            url: "<?php echo $this->Url->build(["controller" => "JobRequirements","action" => "get_states"]);?>",
            data: 'country_id=' + val,
            success: function(data) {
                var json = data;
                $('#candidate-state').empty();
                $('#load-state').html("");
                $('#candidate-state').append(
                    "<option value=''>--Select State--</option>"
                );
                $.each(JSON.parse(json), function(idx, obj) {
                    $('#candidate-state').append(
                        "<option value=" + this.id + ">" + this.name + "</option>"
                    );
                });
            }
        });
    });

    $("#candidate-state").change(function() {
        $('#load-city').html(
            "<img src='/img/loading.gif'>&nbsp;&nbsp;<span style='font-size:12px;'>Getting cities....</span>"
            );
        var val_state = $('#candidate-state').val();
        $.ajax({
            type: "POST",
            url: "<?php echo $this->Url->build(["controller" => "JobRequirements","action" => "get_cities"]);?>",
            data: 'state_id=' + val_state,
            success: function(data) {
                var json = data;
                $('#candidate-city').empty();
                $('#load-city').html("");
                $('#candidate-city').append(
                    "<option value=''>--Select City--</option>"
                );
                $.each(JSON.parse(json), function(idx, obj) {
                    $('#candidate-city').append(
                        "<option value='" + this.city_name + "'>" + this.city_name +
                        "</option>"
                    );
                });
            }
        });
    });

    $("#candidate-city").change(function() {
        $('#load-zipcode').html(
            "<img src='/img/loading.gif'>&nbsp;&nbsp;<span style='font-size:12px;'>Getting zipcode....</span>"
            );
        var val_city = $('#candidate-city').val();
        //alert(val);
        //var val = $("#city-id option:selected").text();
        $.ajax({
            type: "POST",
            url: "<?php echo $this->Url->build(["controller" => "JobRequirements","action" => "get_zipcode"]);?>",
            data: 'city=' + val_city,
            success: function(data) {
                var json = data;
                $('#candidate-zipcode').empty();
                $('#load-zipcode').html("");
                $('#candidate-zipcode').append(
                    "<option value=''>--Select Zipcode--</option>"
                );
                $.each(JSON.parse(json), function(idx, obj) {
                    $('#candidate-zipcode').append(
                        "<option value='" + this.zipcode + "'>" + this.zipcode +
                        "</option>"
                    );
                });
            }
        });
    });

    $("#total-it-experience").change(function() {
        var rel_exp = $('#total-it-experience').val();
        var total_exp = $('#total-overall-experience').val();

        if (rel_exp > total_exp) {
            $('#rel-msg').show();
            $('#rel-msg').html("Relevant Experience can not be greater then Total Exp.");
        } else {
            $('#rel-msg').hide();
            $('#rel-msg').html("");
        }
    });

    $('#key-skills').tagEditor({
        autocomplete: {
            delay: 0, // show suggestions immediately</i>
            position: {
                collision: 'flip'
            }, // automatic menu position up/down</i>
            source: [ <?=$skillDataString;?> ]
        },
        forceLowercase: false,
        placeholder: 'Enter skills ...'
    });
    $('#specialization').tagEditor({
        autocomplete: {
            delay: 0, // show suggestions immediately</i>
            position: {
                collision: 'flip'
            }, // automatic menu position up/down</i>
            source: ['']
        },
        forceLowercase: false,
        placeholder: 'Enter Your Specialization  ...'
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    // Profile picture validation
    $("#profile-pic").change(function() {
        var size = parseInt(this.files[0].size);
        if (size > 20000) {
            $('#blah').hide();
            $('#show-picture').html("<span style='color:red;'>Invalid File Size. Max size is 20 KB.</span>");
            $('#submitBtn').attr('disabled', true);
            return false;
        } else {
            $('#blah').show();
            readURL(this);
            $('#show-picture').html("<span style='color:red;'></span>");
            $('#submitBtn').attr('disabled', false);
        }

        var file = $(this).val();
        var ext = file.split('.').pop();
        if (ext == 'jpeg' || ext == 'jpg' || ext == 'gif' || ext == 'png') {
            $('#blah').show();
            readURL(this);
            $('#show-picture').html("");
            $('#submitBtn').attr('disabled', false);
            return true;
        } else {
            $('#blah').hide();
            $('#show-picture').html(
                "<span style='color:red;'>Invalid Format. Upload jpeg, jpg, gif or png format.</span>");
            $('#submitBtn').attr('disabled', true);
        }
        //$('#blah').show();
    });
</script>