@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'dashboard'
])
@section('content')

<div class="content">
  <div class="card">
 <div class="row">
         <div class="col-md-12">
            <div class="allSteps">
               <!-- Nav tabs -->
               <ul class="nav nav-tabs stepsNavigation ">
                  <li class="nav-item">
                     <a class="nav-link active" data-toggle="tab" href="#objectives-tab">objectives</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" data-toggle="tab" href="#power-tab">power</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" data-toggle="tab" href="#variables-tab">variables </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" data-toggle="tab" href="#comm-tab">communication</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" data-toggle="tab" href="#time-tab">time</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" data-toggle="tab" href="#risk-tab">risk</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" data-toggle="tab" href="#nego-tab">negotiate </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" data-toggle="tab" href="#execute-tab">execute </a>
                  </li>
               </ul>
               <!-- Tab panes -->
               <div class="tab-content">
                  <div class="tab-pane  active" id="objectives-tab">
                     <div class="stepContainer">
         <div class="stepHeader">
            <h3>objectives</h3>
         </div>
         <form id="objectives-form" class="form-control" method="post">
         <div class="row">
            <div class="col-md-6">
               <div class="objectiveBlock">
                  <h3>your objectives</h3>
                  <div class="your_objective">
                     <div id="accordion_0" class="accordion your_accordion radius-1">
                        <div class="card mb-0">
                           <div class="card-header collapsed" data-toggle="collapse" href="#yourexample0">
                              <a class="card-title"> objective 1 </a>
                           </div>
                           <div id="yourexample0" class="card-body collapse show" data-parent="#youraccordion">
                              <div class="form-group form-inline justify-content-between">
                                 <label >specific</label> <input type="text" name="your_specific[]" id="your_specific_0" class="form-control specific_input">
                                 <span class="error specific_error"></span>
                                 <button type="button" class="btn tooltip-q" data-toggle="tooltip" data-placement="left" title="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,">
                                 ?
                                 </button>
                              </div>
                              <div class="form-group form-inline justify-content-between">
                                 <label >measurable</label> <input type="text" name="your_measurable[]" id="your_measurable_0" class="form-control mesaurable_input">
                                 <span class="error"></span>
                                 <button type="button" class="btn tooltip-q" data-toggle="tooltip" data-placement="left" title="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,">
                                 ?
                                 </button>
                              </div>
                              <div class="form-group form-inline justify-content-between">
                                 <label >time bound</label> <input type="text" name="your_time_bound[]" id="your_time_bound_0" class="form-control time_bond_input"><span class="error"></span>
                                 <button type="button" class="btn tooltip-q" data-toggle="tooltip" data-placement="left" title="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,">
                                 ?
                                 </button>
                              </div>
                              <div class="form-group form-inline justify-content-between">
                                 <label >relevant</label> <input type="text" name="your_relevant[]" id="your_relevant_0" class="form-control relevant_input"><span class="error"></span>
                                 <button type="button" class="btn tooltip-q" data-toggle="tooltip" data-placement="left" title="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,">
                                 ?
                                 </button>
                              </div>
                              <div class="form-group form-inline justify-content-between">
                                 <label >achievable</label> <input type="text" name="your_achievable[]" id="your_achievable_0" class="form-control achievable_input"><span class="error"></span>
                                 <button type="button" class="btn tooltip-q" data-toggle="tooltip" data-placement="left" title="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,">
                                 ?
                                 </button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <a href="#" class="addObjective"><i class="fas fa-plus-circle"></i> Add Objective</a>
                  <div class="divider"></div>
                  <div class="restrictions">
                     <div class="form-group">
                        <label>Internal restrictions</label>
                        <textarea id="my-input" class="form-control internal_rest_input" rows="3" type="text" name="your_internal_rest[]"></textarea><span class="error"></span>
                     </div>
                     <div class="form-group">
                        <label>external restrictions</label>
                        <textarea id="my-input" class="form-control external_rest_input" rows="3" type="text" name="your_external_rest[]"></textarea><span class="error"></span>
                     </div>
                  </div>
               </div>    
            </div>
            <div class="col-md-6">
               <div class="objectiveBlock stepBlock">
                  <h3>their objectives</h3>
                  <div class="their_objective">
                     <div id="their_accordion_0" class="accordion their_accordion
                      radius-1">
                        <div class="card mb-0">
                           <div class="card-header collapsed OrangeBg" data-toggle="collapse" href="#theirexample0">
                              <a class="card-title"> objective 1 </a>
                           </div>
                           <div id="theirexample0" class="card-body collapse show" data-parent="#theiraccordion">
                              <div class="form-group form-inline justify-content-between">
                                 <label >specific</label> <input type="text" name="their_specific[]" id="their_specific_0" class="form-control specific_input"><span class="error"></span>
                                 <button type="button" class="btn tooltip-q" data-toggle="tooltip" data-placement="left" title="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,">
                                 ?
                                 </button>
                              </div>
                              <div class="form-group form-inline justify-content-between">
                                 <label >measurable</label> <input type="text" name="their_measurable[]" id="their_measurable_0" class="form-control mesaurable_input"><span class="error"></span>
                                 <button type="button" class="btn tooltip-q" data-toggle="tooltip" data-placement="left" title="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,">
                                 ?
                                 </button>
                              </div>
                              <div class="form-group form-inline justify-content-between">
                                 <label >time bound</label> <input type="text" name="their_time_bound[]" id="their_time_bound_0"  class="form-control time_bond_input"><span class="error"></span>
                                 <button type="button" class="btn tooltip-q" data-toggle="tooltip" data-placement="left" title="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,">
                                 ?
                                 </button>
                              </div>
                              <div class="form-group form-inline justify-content-between">
                                 <label >relevant</label> <input type="text" name="their_relevant[]" id="their_relevant_0" class="form-control relevant_input"><span class="error"></span>
                                 <button type="button" class="btn tooltip-q" data-toggle="tooltip" data-placement="left" title="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,">
                                 ?
                                 </button>
                              </div>
                              <div class="form-group form-inline justify-content-between">
                                 <label >achievable</label> <input type="text" name="their_achievable[]" id="their_achievable_0" class="form-control achievable_input"><span class="error"></span>
                                 <button type="button" class="btn tooltip-q" data-toggle="tooltip" data-placement="left" title="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,">
                                 ?
                                 </button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <a href="#" class="addObjective" ><i class="fas fa-plus-circle" ></i> Add Objective</a>
                  <div class="divider"></div>
                  <div class="restrictions">
                     <div class="form-group">
                        <label>Internal restrictions</label>
                        <textarea id="my-input" class="form-control internal_rest_input" rows="3" type="text" name="their_internal_rest[]"></textarea><span class="error"></span>
                     </div>
                     <div class="form-group">
                        <label>external restrictions</label>
                        <textarea id="my-input" class="form-control external_rest_input" rows="3" type="text" name="their_external_rest[]"></textarea><span class="error"></span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-12 actionButtons">
               <div class="divider"></div>
               <button type="button" class="btn btn-default btn-md btn-block-sm" id="SaveObjectives">Next</button>
               <button type="button" class="btn btn-border btn-md">skip</button>
            </div>
         </div>
      </form>
      </div>
                  </div>
                  <div class="tab-pane  fade" id="power-tab">
                     <div class="stepContainer">
                        <div class="stepHeader">
                           <h3>power</h3>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="stepBlock">
                                 <div class="d-flex powerStep justify-content-between align-items-center">
                                    <h3>power director</h3>
                                    <div class="headerPoints">
                                       <ul>
                                          <li><span>2</span>Strongly Disagree</li>
                                          <li><span>1</span>agree</li>
                                          <li><span>-1</span>Disagree</li>
                                          <li><span>-2</span>Strongly Disagree</li>
                                       </ul>
                                    </div>
                                 </div>
                                 <div class="questions">
                                    <div class="questionhdr">
                                       <h4>Answer the following statements regarding your negotiation, thinking from Your point 
                                          of view
                                       </h4>
                                       <h5>You</h5>
                                       <div class="questionblk d-flex justify-content-between align-items-center">
                                          <p><strong>1.</strong> Our alternatives outside of this negotiation are stronger than theirs.</p>
                                          <div class="select">
                                             <img src="assets/images/arrow-down.svg" class="icon-select" alt="">
                                             <select name="" id="">
                                                <option value="">1</option>
                                                <option value="">2</option>
                                                <option value="">1</option>
                                                <option value="">-2</option>
                                                <option value="">-1</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="questionblk d-flex justify-content-between align-items-center">
                                          <p><strong>2.</strong> They have more information about our options and circumstances.</p>
                                          <div class="select">
                                             <img src="assets/images/arrow-down.svg" class="icon-select" alt="">
                                             <select name="" id="">
                                                <option value="">1</option>
                                                <option value="">2</option>
                                                <option value="">1</option>
                                                <option value="">-2</option>
                                                <option value="">-1</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="questionblk d-flex justify-content-between align-items-center">
                                          <p><strong>3.</strong> They believe that they are our only option.</p>
                                          <div class="select">
                                             <img src="assets/images/arrow-down.svg" class="icon-select" alt="">
                                             <select name="" id="">
                                                <option value="">1</option>
                                                <option value="">2</option>
                                                <option value="">1</option>
                                                <option value="">-2</option>
                                                <option value="">-1</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="questionblk d-flex justify-content-between align-items-center">
                                          <p><strong>4.</strong> They have less time pressure to agree than we do.</p>
                                          <div class="select">
                                             <img src="assets/images/arrow-down.svg" class="icon-select" alt="">
                                             <select name="" id="">
                                                <option value="">1</option>
                                                <option value="">2</option>
                                                <option value="">1</option>
                                                <option value="">-2</option>
                                                <option value="">-1</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="questionblk d-flex justify-content-between align-items-center">
                                          <p><strong>5.</strong> They perceive deadlock as having greater consequence to them than to us.</p>
                                          <div class="select">
                                             <img src="assets/images/arrow-down.svg" class="icon-select" alt="">
                                             <select name="" id="">
                                                <option value="">1</option>
                                                <option value="">2</option>
                                                <option value="">1</option>
                                                <option value="">-2</option>
                                                <option value="">-1</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="questionscore d-flex justify-content-between align-items-center">
                                          <span>total score</span>
                                          <span>3</span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="questions">
                                    <div class="questionhdr">
                                       <h4>Answer the following statements regarding your negotiation, thinking from Your point 
                                          of view
                                       </h4>
                                       <h5 class="OrangeBg">Your Counterparty:</h5>
                                       <div class="questionblk d-flex justify-content-between align-items-center">
                                          <p><strong>1.</strong> Our alternatives outside of this negotiation are stronger than theirs.</p>
                                          <div class="select">
                                             <img src="assets/images/arrow-down.svg" class="icon-select" alt="">
                                             <select name="" id="">
                                                <option value="">1</option>
                                                <option value="">2</option>
                                                <option value="">1</option>
                                                <option value="">-2</option>
                                                <option value="">-1</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="questionblk d-flex justify-content-between align-items-center">
                                          <p><strong>2.</strong> They have more information about our options and circumstances.</p>
                                          <div class="select">
                                             <img src="assets/images/arrow-down.svg" class="icon-select" alt="">
                                             <select name="" id="">
                                                <option value="">1</option>
                                                <option value="">2</option>
                                                <option value="">1</option>
                                                <option value="">-2</option>
                                                <option value="">-1</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="questionblk d-flex justify-content-between align-items-center">
                                          <p><strong>3.</strong> They believe that they are our only option.</p>
                                          <div class="select">
                                             <img src="assets/images/arrow-down.svg" class="icon-select" alt="">
                                             <select name="" id="">
                                                <option value="">1</option>
                                                <option value="">2</option>
                                                <option value="">1</option>
                                                <option value="">-2</option>
                                                <option value="">-1</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="questionblk d-flex justify-content-between align-items-center">
                                          <p><strong>4.</strong> They have less time pressure to agree than we do.</p>
                                          <div class="select">
                                             <img src="assets/images/arrow-down.svg" class="icon-select" alt="">
                                             <select name="" id="">
                                                <option value="">1</option>
                                                <option value="">2</option>
                                                <option value="">1</option>
                                                <option value="">-2</option>
                                                <option value="">-1</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="questionblk d-flex justify-content-between align-items-center">
                                          <p><strong>5.</strong> They perceive deadlock as having greater consequence to them than to us.</p>
                                          <div class="select">
                                             <img src="assets/images/arrow-down.svg" class="icon-select" alt="">
                                             <select name="" id="">
                                                <option value="">1</option>
                                                <option value="">2</option>
                                                <option value="">1</option>
                                                <option value="">-2</option>
                                                <option value="">-1</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="questionscore d-flex justify-content-between align-items-center">
                                          <span>total score</span>
                                          <span>3</span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="powerDscore d-flex justify-content-between">
                                    <span>POWER DIFFERENTIAL (Total Both Scores)</span>
                                    <span class="positive">2</span>
                                 </div>
                                 <div class="scoreInfo">
                                    <p><strong>7 to 20 :</strong> You have more power than they do</p>
                                    <p><strong>-6 to 6 : </strong>  Power is shared. Seek collaborative solutions.</p>
                                    <p class="active positive"><strong>7 to 20 :</strong> You have more power than they do</p>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="stepBlock">
                                 <h3>power perception shifter</h3>
                                 <div class="perceptionBlock">
                                    <div class="form-group box">
                                       <label for=""><strong>1.</strong> Where do they think we have power?</label>
                                       <textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
                                    </div>
                                    <div class="iconBlock box enhance">
                                       <img src="assets/images/enhance.svg" alt="">
                                       <h6>enhance</h6>
                                    </div>
                                    <div class="form-group box">
                                       <label for="">How ?</label>
                                       <textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
                                    </div>
                                 </div>
                                 <div class="perceptionBlock">
                                    <div class="form-group box">
                                       <label for=""><strong>1.</strong> Where do they think we have power?</label>
                                       <textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
                                    </div>
                                    <div class="iconBlock box change">
                                       <img src="assets/images/change.svg" alt="">
                                       <h6>change</h6>
                                    </div>
                                    <div class="form-group box">
                                       <label for="">How ?</label>
                                       <textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
                                    </div>
                                 </div>
                                 <div class="perceptionBlock">
                                    <div class="form-group box">
                                       <label for=""><strong>1.</strong> Where do they think we have power?</label>
                                       <textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
                                    </div>
                                    <div class="iconBlock box downgrade">
                                       <img src="assets/images/downgrade.svg" alt="">
                                       <h6>downgrade</h6>
                                    </div>
                                    <div class="form-group box">
                                       <label for="">How ?</label>
                                       <textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
                                    </div>
                                 </div>
                                 <div class="perceptionBlock">
                                    <div class="form-group box">
                                       <label for=""><strong>1.</strong> Where do they think we have power?</label>
                                       <textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
                                    </div>
                                    <div class="iconBlock box explot">
                                       <img src="assets/images/explot.svg" alt="">
                                       <h6>explot</h6>
                                    </div>
                                    <div class="form-group box">
                                       <label for="">How ?</label>
                                       <textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
                                    </div>
                                 </div>
                              </div>
                              <div class="PowerstateInfo">
                                 <p> <strong>Positive Power State: </strong> When you are in a positive power state, you can choose to negotiate and operate in any style you chose, imposing your position on the other party. Recognize however the potential downfalls of abusing one's power, especially for short term gain in a long-term relationship. Below are some of the implications of operating in a positive power state to the following steps in the process:</p>
                                 <ul>
                                    <li>
                                       <p> <strong>Communication: </strong>You control how you communicate with the other party and who communicates with the other party. The tone of your messaging can be firm and direct. Generally, when in a positive power state, it is advisable that you limit the other party’s access to your senior stakeholders. Ideally you want your front-line negotiators to be seen as having full authority to act on the company's behalf, when senior stakeholders step in, they risk undermining their people’s authority in the other party’s eyes. This can establish a bad precedent which is difficult to recover from. </p>
                                    </li>
                                    <li>
                                       <p> <strong>Time: </strong>Time restrictions are generally imposed on the other party, with clearly laid out consequences for failure to comply, that are both realistic and actionable. If deadlines are not met, consequences must be enforced, if not, you risk eroding your credibility in the other party’s eyes, and thus losing power.  </p>
                                    </li>
                                    <li>
                                       <p> <strong>Risk: </strong>Is generally lower when you are in a positive power state, and what risks do exist, you attempt to pass off to the other party. That said, a risk assessment is still needed to identify any possible risks, even as unlikely as they may be.   </p>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                           <div class="col-md-12 actionButtons">
                              <div class="divider"></div>
                              <a href="#" class="btn btn-default btn-md">Next</a>
                              <a href="#" class="btn btn-border btn-md">skip</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane  fade" id="variables-tab">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="stepContainer">
                              <div class="stepHeader">
                                 <h3>variables</h3>
                              </div>
                              <div class="stepTable">
                                 <table class="table table-bordered table-variables table-responsive-sm">
                                    <thead class="thead-orange">
                                       <tr>
                                          <th scope="col" colspan="3"></th>
                                          <th scope="col" colspan="2" class="text-center">take</th>
                                          <th scope="col" colspan="2" class="text-center">give</th>
                                          <th scope="col"></th>
                                       </tr>
                                    </thead>
                                    <thead class="thead-light">
                                       <tr>
                                          <th scope="col"></th>
                                          <th scope="col">variables </th>
                                          <th scope="col">Take/Give </th>
                                          <th scope="col">value<span class="subText">your</span></th>
                                          <th scope="col">cost<span class="subText">their</span></th>
                                          <th scope="col">cost<span class="subText">your</span></th>
                                          <th scope="col">value<span class="subText">their</span></th>
                                          <th scope="col">your breakpoint</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td >1</td>
                                          <td><input type="text" class="form-control"> </td>
                                          <td>
                                             <div class="select">
                                                <span class="select_icon"><img src="assets/images/dropdownicon.svg" alt=""></span>
                                                <select name="" id="" class="form-control">
                                                   <option value="">Give</option>
                                                   <option value="">Take</option>
                                                   <option value="">Take/Give</option>
                                                </select>
                                             </div>
                                          </td>
                                          <td><input type="text" class="form-control"> </td>
                                          <td><input type="text" class="form-control"> </td>
                                          <td><input type="text" class="form-control"> </td>
                                          <td><input type="text" class="form-control"> </td>
                                          <td><input type="text" class="form-control"> </td>
                                       </tr>
                                       <tr>
                                          <td >2</td>
                                          <td><input type="text" class="form-control"> </td>
                                          <td>
                                             <div class="select givesucess">
                                                <span class="select_icon"><img src="assets/images/dropdownicon.svg" alt=""></span>
                                                <select name="" id="" class="form-control">
                                                   <option value="" selected>Give</option>
                                                   <option value="">Take</option>
                                                   <option value="">Take/Give</option>
                                                </select>
                                             </div>
                                          </td>
                                          <td class="givedefault"><input type="text" class="form-control"> </td>
                                          <td class="givedefault"><input type="text" class="form-control"> </td>
                                          <td class="select givesucess"><input type="text" class="form-control"> </td>
                                          <td class="select givesucess"><input type="text" class="form-control"> </td>
                                          <td><input type="text" class="form-control"> </td>
                                       </tr>
                                       <tr>
                                          <td >3</td>
                                          <td><input type="text" class="form-control"> </td>
                                          <td>
                                             <div class="select takedanger">
                                                <span class="select_icon"><img src="assets/images/dropdownicon.svg" alt=""></span>
                                                <select name="" id="" class="form-control">
                                                   <option value="" selected>Give</option>
                                                   <option value="">Take</option>
                                                   <option value="">Take/Give</option>
                                                </select>
                                             </div>
                                          </td>
                                          <td class="takedanger"><input type="text" class="form-control"> </td>
                                          <td class="takedanger"><input type="text" class="form-control"> </td>
                                          <td class="select takedefault"><input type="text" class="form-control"> </td>
                                          <td class="select takedefault"><input type="text" class="form-control"> </td>
                                          <td><input type="text" class="form-control"> </td>
                                       </tr>
                                       <tr>
                                          <td >4</td>
                                          <td><input type="text" class="form-control"> </td>
                                          <td>
                                             <div class="select takedanger">
                                                <span class="select_icon"><img src="assets/images/dropdownicon.svg" alt=""></span>
                                                <select name="" id="" class="form-control">
                                                   <option value="">Take/Give</option>
                                                   <option value="" selected>Give</option>
                                                   <option value="">Take</option>
                                                </select>
                                             </div>
                                          </td>
                                          <td class="takedanger"><input type="text" class="form-control"> </td>
                                          <td class="takedanger"><input type="text" class="form-control"> </td>
                                          <td class="select givesucess"><input type="text" class="form-control"> </td>
                                          <td class="select givesucess"><input type="text" class="form-control"> </td>
                                          <td><input type="text" class="form-control"> </td>
                                       </tr>
                                       <tr>
                                          <td >5</td>
                                          <td><input type="text" class="form-control"> </td>
                                          <td>
                                             <div class="select">
                                                <span class="select_icon"><img src="assets/images/dropdownicon.svg" alt=""></span>
                                                <select name="" id="" class="form-control">
                                                   <option value="">Give</option>
                                                   <option value="">Take</option>
                                                   <option value="">Take/Give</option>
                                                </select>
                                             </div>
                                          </td>
                                          <td><input type="text" class="form-control"> </td>
                                          <td><input type="text" class="form-control"> </td>
                                          <td><input type="text" class="form-control"> </td>
                                          <td><input type="text" class="form-control"> </td>
                                          <td><input type="text" class="form-control"> </td>
                                       </tr>
                                       <tr>
                                          <td >6</td>
                                          <td><input type="text" class="form-control"> </td>
                                          <td>
                                             <div class="select">
                                                <span class="select_icon"><img src="assets/images/dropdownicon.svg" alt=""></span>
                                                <select name="" id="" class="form-control">
                                                   <option value="">Give</option>
                                                   <option value="">Take</option>
                                                   <option value="">Take/Give</option>
                                                </select>
                                             </div>
                                          </td>
                                          <td><input type="text" class="form-control"> </td>
                                          <td><input type="text" class="form-control"> </td>
                                          <td><input type="text" class="form-control"> </td>
                                          <td><input type="text" class="form-control"> </td>
                                          <td><input type="text" class="form-control"> </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                           <div class="col-md-12 actionButtons">
                              <div class="divider"></div>
                              <a href="#" class="btn btn-default btn-md btn-block-sm">Next</a>
                              <a href="#" class="btn btn-border btn-md">skip</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane  fade" id="comm-tab">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="stepContainer">
                              <div class="stepHeader">
                                 <h3>variables</h3>
                              </div>
                              <div class="stepTable">
                                 <table class="table table-bordered table-communication table-responsive-sm">
                                    <thead class="thead-orange">
                                       <tr>
                                          <th scope="col" colspan="8">KEY PLAYERS ( Their side)</th>
                                          <th scope="col"></th>
                                       </tr>
                                    </thead>
                                    <thead class="thead-light">
                                       <tr>
                                          <th scope="col">Who</th>
                                          <th scope="col">title </th>
                                          <th scope="col">LinkedIn URL </th>
                                          <th scope="col">personality type<span class="subText">your</span></th>
                                          <th scope="col">key decision maker<span class="subText">their</span></th>
                                          <th scope="col">decision maker type <span class="subText">your</span></th>
                                          <th scope="col">influenced by<span class="subText">their</span></th>
                                          <th scope="col">relationship status</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td class="name"><input type="text" class="form-control">    <button type="button" class="btn btn-default" data-toggle="tooltip" data-html="true" title="<img src=&quot;https://placeimg.com/100/100/animals&quot;>">
                                             <i class="fas fa-eye"></i>
                                             </button>
                                          </td>
                                          <td><input type="text" class="form-control"> </td>
                                          <td><input type="text" class="form-control"> </td>
                                          <td><input type="text" class="form-control"> </td>
                                          <td>
                                             <input type="text" class="form-control">  
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1"></label>
                                             </div>
                                          </td>
                                          <td><input type="text" class="form-control"> </td>
                                          <td>
                                             <input type="text" class="form-control">
                                             <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Dropdown button
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                   <a class="dropdown-item" href="#">Action</a>
                                                   <a class="dropdown-item" href="#">Another action</a>
                                                   <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                             </div>
                                          </td>
                                          <td><input type="text" class="form-control"> </td>
                                       </tr>
                                       <tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                           <div class="col-md-12 actionButtons">
                              <div class="divider"></div>
                              <a href="#" class="btn btn-default btn-md btn-block-sm">Next</a>
                              <a href="#" class="btn btn-border btn-md">skip</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane  fade" id="time-tab">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="stepContainer">
                              <div class="stepHeader">
                                 <h3>time</h3>
                              </div>
                              <div class="stepTable">
                                 <div class="dateSelect d-flex justify-content-between align-items-center my-2">
                                    <div class=" d-flex">
                                       <div class="form-group mr-2">
                                          <label for="">Start Date</label>
                                          <input type="date" class="form-control" name="" id="">
                                       </div>
                                       <div class="form-group ">
                                          <label for="">End Date</label>
                                          <input type="date" class="form-control" name="" id="">
                                       </div>
                                    </div>
                                    <a href="#" class="btn btn-link" data-toggle="modal" data-target="#timeGraph">View Graph</a>
                                 </div>
                                 <table class="table table-bordered table-time table-responsive-sm">
                                    <thead class="thead-light">
                                       <tr>
                                          <th scope="col" colspan="2">key event actions</th>
                                          <th scope="col">date </th>
                                          <th scope="col">who </th>
                                          <th scope="col" colspan="2">what</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td><button class="addButton"><i class="fas fa-plus-circle"></i></button></td>
                                          <td class="f2f">
                                             <div class="select">
                                                <span class="select_icon"><img src="assets/images/dropdownicon.svg" alt=""></span>
                                                <select name="" id="" class="form-control">
                                                   <option value="">Face to Face</option>
                                                   <option value="">Email</option>
                                                   <option value="">Phone Call</option>
                                                </select>
                                             </div>
                                          </td>
                                          <td><input type="date" class="form-control" name="" id=""></td>
                                          <td><input type="text" class="form-control" name="" id=""></td>
                                          <td><input type="text" class="form-control" name="" id=""></td>
                                          <td></td>
                                       </tr>
                                       <tr>
                                          <td><button class="addButton"><i class="fas fa-plus-circle"></i></button></td>
                                          <td class="email-td">
                                             <div class="select">
                                                <span class="select_icon"><img src="assets/images/dropdownicon.svg" alt=""></span>
                                                <select name="" id="" class="form-control">
                                                   <option value="">Email</option>
                                                   <option value="">Face to Face</option>
                                                   <option value="">Phone Call</option>
                                                </select>
                                             </div>
                                          </td>
                                          <td><input type="date" class="form-control" name="" id=""></td>
                                          <td><input type="text" class="form-control" name="" id=""></td>
                                          <td><input type="text" class="form-control" name="" id=""></td>
                                          <td><button class="removeButton"><i class="fas fa-times-circle"></i></button></td>
                                       </tr>
                                       <tr>
                                          <td><button class="addButton"><i class="fas fa-plus-circle"></i></button></td>
                                          <td class="phone-call">
                                             <div class="select">
                                                <span class="select_icon"><img src="assets/images/dropdownicon.svg" alt=""></span>
                                                <select name="" id="" class="form-control">
                                                   <option value="">Phone Call</option>
                                                   <option value="">Face to Face</option>
                                                   <option value="">Email</option>
                                                </select>
                                             </div>
                                          </td>
                                          <td><input type="date" class="form-control" name="" id=""></td>
                                          <td><input type="text" class="form-control" name="" id=""></td>
                                          <td><input type="text" class="form-control" name="" id=""></td>
                                          <td><button class="removeButton"><i class="fas fa-times-circle"></i></button></td>
                                       </tr>
                                       <tr>
                                    </tbody>
                                 </table>
                              </div>
                              <!-- The Modal -->
                              <div class="modal fade" id="timeGraph">
                                 <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                       <!-- Modal Header -->
                                       <div class="modal-header">
                                          <h4 class="modal-title">Modal Heading</h4>
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                       </div>
                                       <!-- Modal body -->
                                       <div class="modal-body">
                                       </div>
                                       <!-- Modal footer -->
                                       <div class="modal-footer">
                                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12 actionButtons">
                              <div class="divider"></div>
                              <a href="#" class="btn btn-default btn-md btn-block-sm">Next</a>
                              <a href="#" class="btn btn-border btn-md">skip</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane  fade" id="risk-tab">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="stepContainer">
                              <div class="stepHeader">
                                 <h3>risk analysis</h3>
                              </div>
                              <div class="stepTable table-risk">
                                 <div class="tableContainer">
                                    <button class="addButton"><i class="fas fa-plus-circle"></i></button>
                                    <table class="table table-bordered  table-responsive-sm">
                                       <thead class="thead-orange">
                                          <tr>
                                             <th scope="col" >risk</th>
                                             <th scope="col">probability </th>
                                             <th scope="col" class="text-center">impact on business </th>
                                             <th scope="col" class="text-center">impact score</th>
                                             <th scope="col" >risk level</th>
                                          </tr>
                                       </thead>
                                       <thead class="thead-light">
                                          <tr>
                                             <th scope="col" >risk 1</th>
                                             <th scope="col"><input type="text " class="form-control"> </th>
                                             <th scope="col"><input type="text" class="form-control text-center"> </th>
                                             <th scope="col" ><input type="text" class="form-control text-center"></th>
                                             <th class="highImpact">
                                                High
                                             </th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <tr>
                                             <td>  Risk Description</td>
                                             <td colspan="4"><input type="text" class="form-control"></td>
                                          </tr>
                                          <tr>
                                             <td>preventive Description</td>
                                             <td colspan="4"><input type="text" class="form-control"></td>
                                          </tr>
                                          <tr>
                                             <td>mitigation action</td>
                                             <td colspan="4"><input type="text" class="form-control"></td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                                 <div class="tableContainer">
                                    <button class="addButton"><i class="fas fa-plus-circle"></i></button>
                                    <button class="removeButton"><i class="fas fa-times-circle"></i></button>
                                    <table class="table table-bordered  table-responsive-sm">
                                       <thead class="thead-light">
                                          <tr>
                                             <th scope="col" >risk 1</th>
                                             <th scope="col"><input type="text " class="form-control"> </th>
                                             <th scope="col"><input type="text" class="form-control text-center"> </th>
                                             <th scope="col" ><input type="text" class="form-control text-center"></th>
                                             <th class="lowImpact">
                                                Low
                                             </th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <tr>
                                             <td>  Risk Description</td>
                                             <td colspan="4"><input type="text" class="form-control"></td>
                                          </tr>
                                          <tr>
                                             <td>preventive Description</td>
                                             <td colspan="4"><input type="text" class="form-control"></td>
                                          </tr>
                                          <tr>
                                             <td>mitigation action</td>
                                             <td colspan="4"><input type="text" class="form-control"></td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12 actionButtons">
                              <div class="divider"></div>
                              <a href="#" class="btn btn-default btn-md btn-block-sm">Next</a>
                              <a href="#" class="btn btn-border btn-md">skip</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane  fade" id="nego-tab">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="stepContainer">
                              <div class="stepHeader ">
                                 <h3>offer sheet</h3>
                                 <a href="#" class="viewSummary" data-toggle="modal" data-target="#summaryDialog"> <img src="assets/images/dashboard.svg" alt=""> View Summary</a>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="stepTable  table-negotiation">
                                       <div class="tableContainer">
                                          <button class="addButton"><i class="fas fa-plus-circle"></i></button>
                                          <button class="removeButton"><i class="fas fa-times-circle"></i></button>
                                          <table class="table table-bordered  table-responsive-sm">
                                             <thead class="thead-orange">
                                                <th colspan="2">offer 1</th>
                                             </thead>
                                             <thead class="thead-light">
                                                <tr>
                                                   <th scope="col" >If you (Takes)</th>
                                                   <th scope="col" >Then we (Gives)</th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                                <tr>
                                                   <td><input type="text" class="form-control"></td>
                                                   <td><input type="text" class="form-control"></td>
                                                </tr>
                                                <tr>
                                                   <td><input type="text" class="form-control"></td>
                                                   <td><input type="text" class="form-control"></td>
                                                </tr>
                                                <tr>
                                                   <td><input type="text" class="form-control"></td>
                                                   <td><input type="text" class="form-control"></td>
                                                </tr>
                                                <tr>
                                                   <td><input type="text" class="form-control"></td>
                                                   <td><input type="text" class="form-control"></td>
                                                </tr>
                                                <tr>
                                                   <td><input type="text" class="form-control"></td>
                                                   <td><input type="text" class="form-control"></td>
                                                </tr>
                                                <tr>
                                                   <td><input type="text" class="form-control"></td>
                                                   <td><input type="text" class="form-control"></td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="modal fade" id="summaryDialog">
                                 <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                       <!-- Modal Header -->
                                       <div class="modal-header">
                                          <h4 class="modal-title">Modal Heading</h4>
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                       </div>
                                       <!-- Modal body -->
                                       <div class="modal-body">
                                       </div>
                                       <!-- Modal footer -->
                                       <div class="modal-footer">
                                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12 actionButtons">
                              <div class="divider"></div>
                              <a href="#" class="btn btn-default btn-md btn-block-sm">Next</a>
                              <a href="#" class="btn btn-border btn-md">skip</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane  fade" id="execute-tab">
                  </div>
               </div>
            </div>
         </div>
      </div>
  </div>

</div>
@include('pages.js.planning_tools')

@endsection