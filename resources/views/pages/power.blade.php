@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'dashboard'
])
@section('content')
<div class="content">
 <div class="messages"></div>
 <form method="post" id="powerForm">
<div class="row">
            <div class="col-md-12">
                <div class="card">

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
                     of view</h4>
                   <h5>You</h5>
                   <div class="questionblk d-flex justify-content-between align-items-center">
                    <p><strong>1.</strong> Our alternatives outside of this negotiation are stronger than theirs.</p>
                   
                    <div class="select">
                       <img src="{{ asset('uploads/images/detail_page_icons')}}/arrow-down.svg" class="icon-select" alt="">
                        <select name="your_question1" id="your_question1" class="your_onchange">
                           <option value="">----</option> 
                           <option value="1">1</option> 
                           <option value="2">2</option> 
                           <option value="1">1</option> 
                           <option value="-2">-2</option>
                           <option value="-1">-1</option>
                        </select>
                    </div>  
                   </div>
                   <div class="questionblk d-flex justify-content-between align-items-center">
                        <p><strong>2.</strong> They have more information about our options and circumstances.</p>
                       
                        <div class="select">
                           <img src="{{ asset('uploads/images/detail_page_icons')}}/arrow-down.svg" class="icon-select" alt="">
                            <select name="your_question2" id="your_question2" class="your_onchange">
                              <option value="">----</option> 
                              <option value="1">1</option> 
                              <option value="2">2</option> 
                              <option value="1">1</option> 
                              <option value="-2">-2</option>
                              <option value="-1">-1</option>
                           </select>
                        </div>  
                       </div>
                       <div class="questionblk d-flex justify-content-between align-items-center">
                           <p><strong>3.</strong> They believe that they are our only option.</p>
                          
                           <div class="select">
                              <img src="{{ asset('uploads/images/detail_page_icons')}}/arrow-down.svg" class="icon-select" alt="">
                               <select name="your_question3" id="your_question3" class="your_onchange">
                                 <option value="">----</option> 
                                 <option value="1">1</option> 
                                 <option value="2">2</option> 
                                 <option value="1">1</option> 
                                 <option value="-2">-2</option>
                                 <option value="-1">-1</option>
                              </select>
                           </div>  
                          </div>
                          <div class="questionblk d-flex justify-content-between align-items-center">
                              <p><strong>4.</strong> They have less time pressure to agree than we do.</p>
                             
                              <div class="select">
                                 <img src="{{ asset('uploads/images/detail_page_icons')}}/arrow-down.svg" class="icon-select" alt="">
                                  <select name="your_question4" id="your_question4" class="your_onchange">
                                    <option value="">----</option> 
                                    <option value="1">1</option> 
                                    <option value="2">2</option> 
                                    <option value="1">1</option> 
                                    <option value="-2">-2</option>
                                    <option value="-1">-1</option>
                                 </select>
                              </div>  
                             </div>
                             <div class="questionblk d-flex justify-content-between align-items-center">
                                 <p><strong>5.</strong> They perceive deadlock as having greater consequence to them than to us.</p>
                                
                                 <div class="select">
                                    <img src="{{ asset('uploads/images/detail_page_icons')}}/arrow-down.svg" class="icon-select" alt="">
                                     <select name="your_question5" id="your_question5" class="your_onchange">
                                       <option value="">----</option> 
                                       <option value="1">1</option> 
                                       <option value="2">2</option> 
                                       <option value="1">1</option> 
                                       <option value="-2">-2</option>
                                       <option value="-1">-1</option>
                                    </select>
                                 </div>  
                                </div>
                                <div class="questionscore d-flex justify-content-between align-items-center">
                                   <span>total score</span>
                                   <span class="your_total">0</span>
                                </div>

                  </div>
                  </div>
                  <div class="questions">
                        <div class="questionhdr">
                       <h4>Answer the following statements regarding your negotiation, thinking from Your point 
                           of view</h4>
                         <h5 class="OrangeBg">Your Counterparty:</h5>
                         <div class="questionblk d-flex justify-content-between align-items-center">
                          <p><strong>1.</strong> Our alternatives outside of this negotiation are stronger than theirs.</p>
                         
                          <div class="select">
                             <img src="{{ asset('uploads/images/detail_page_icons')}}/arrow-down.svg" class="icon-select" alt="">
                              <select name="counter_question1" id="counter_question1" class="counter_onchange">
                                 <option value="">----</option> 
                                 <option value="1">1</option> 
                                 <option value="2">2</option> 
                                 <option value="1">1</option>
                                 <option value="-2">-2</option>
                                 <option value="1">-1</option>
                               </select>
                          </div>  
                         </div>
                         <div class="questionblk d-flex justify-content-between align-items-center">
                              <p><strong>2.</strong> They have more information about our options and circumstances.</p>
                             
                              <div class="select">
                                 <img src="{{ asset('uploads/images/detail_page_icons')}}/arrow-down.svg" class="icon-select" alt="">
                                  <select name="counter_question2" id="counter_question2" class="counter_onchange">
                                    <option value="">----</option> 
                                    <option value="1">1</option> 
                                    <option value="2">2</option> 
                                    <option value="1">1</option> 
                                    <option value="-2">-2</option>
                                    <option value="-1">-1</option>
                                 </select>
                              </div>  
                             </div>
                             <div class="questionblk d-flex justify-content-between align-items-center">
                                 <p><strong>3.</strong> They believe that they are our only option.</p>
                                
                                 <div class="select">
                                    <img src="{{ asset('uploads/images/detail_page_icons')}}/arrow-down.svg" class="icon-select" alt="">
                                     <select name="counter_question3" id="counter_question3" class="counter_onchange">
                                       <option value="">----</option> 
                                       <option value="1">1</option> 
                                       <option value="2">2</option> 
                                       <option value="1">1</option> 
                                       <option value="-2">-2</option>
                                       <option value="-1">-1</option>
                                    </select>
                                 </div>  
                                </div>
                                <div class="questionblk d-flex justify-content-between align-items-center">
                                    <p><strong>4.</strong> They have less time pressure to agree than we do.</p>
                                   
                                    <div class="select">
                                       <img src="{{ asset('uploads/images/detail_page_icons')}}/arrow-down.svg" class="icon-select" alt="">
                                        <select name="counter_question4" id="counter_question4" class="counter_onchange">
                                          <option value="">----</option> 
                                          <option value="1">1</option> 
                                          <option value="2">2</option> 
                                          <option value="1">1</option> 
                                          <option value="-2">-2</option>
                                          <option value="-1">-1</option>
                                       </select>
                                    </div>  
                                   </div>
                                   <div class="questionblk d-flex justify-content-between align-items-center">
                                       <p><strong>5.</strong> They perceive deadlock as having greater consequence to them than to us.</p>
                                      
                                       <div class="select">
                                          <img src="{{ asset('uploads/images/detail_page_icons')}}/arrow-down.svg" class="icon-select" alt="">
                                           <select name="counter_question5" id="counter_question5" class="counter_onchange">
                                             <option value="">----</option> 
                                             <option value="1">1</option> 
                                             <option value="2">2</option> 
                                             <option value="1">1</option> 
                                             <option value="-2">-2</option>
                                             <option value="-1">-1</option>
                                          </select>
                                       </div>  
                                      </div>
                                      <div class="questionscore d-flex justify-content-between align-items-center">
                                         <span>total score</span>
                                         <span class="counter_total">0</span>
                                      </div>
      
                        </div>
                        </div>

                        <div class="powerDscore d-flex justify-content-between">
                           <span>POWER DIFFERENTIAL (Total Both Scores)</span>
                           <span class="positive diffrence">0</span>
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
                           <label ><strong>1.</strong> Where do they think we have power?</label>
                           <textarea name="inhence_think" id="inhence_think" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="iconBlock box enhance">
                         <img src="{{ asset('uploads/images/detail_page_icons')}}/enhance.svg" alt="">
                         <h6>enhance</h6>
                        </div>
                        <div class="form-group box">
                              <label >How ?</label>
                              <textarea name="inhence_how" id="inhence_how" cols="30" rows="3" class="form-control"></textarea>
                           </div>
                     </div>
                     <div class="perceptionBlock">
                           <div class="form-group box">
                              <label ><strong>1.</strong> Where do they think we have power?</label>
                              <textarea name="change_think" id="change_think" cols="30" rows="3" class="form-control"></textarea>
                           
                           </div>
                           <div class="iconBlock box change">
                            <img src="{{ asset('uploads/images/detail_page_icons')}}/change.svg" alt="">
                            <h6>change</h6>
                           </div>
                           <div class="form-group box">
                                 <label >How ?</label>
                                 <textarea name="change_how" id="change_how" cols="30" rows="3" class="form-control"></textarea>
                              </div>
                        </div>
                        <div class="perceptionBlock">
                              <div class="form-group box">
                                 <label ><strong>1.</strong> Where do they think we have power?</label>
                                 <textarea name="downgrade_think" id="downgrade_think" cols="30" rows="3" class="form-control"></textarea>
                              </div>
                              <div class="iconBlock box downgrade">
                               <img src="{{ asset('uploads/images/detail_page_icons')}}/downgrade.svg" alt="">
                               <h6>downgrade</h6>
                              </div>
                              <div class="form-group box">
                                    <label >How ?</label>
                                    <textarea name="downgrade_how" id="downgrade_how" cols="30" rows="3" class="form-control"></textarea>
                                 </div>
                           </div>
                           <div class="perceptionBlock">
                                 <div class="form-group box">
                                    <label ><strong>1.</strong> Where do they think we have power?</label>
                                    <textarea name="explot_think" id="explot_think" cols="30" rows="3" class="form-control"></textarea>
                                 </div>
                                 <div class="iconBlock box explot">
                                  <img src="{{ asset('uploads/images/detail_page_icons')}}/explot.svg" alt="">
                                  <h6>explot</h6>
                                 </div>
                                 <div class="form-group box">
                                       <label >How ?</label>
                                       <textarea name="explot_how" id="explot_how" cols="30" rows="3" class="form-control"></textarea>
                                    </div>
                              </div>
               </div>
            </div>
        
            <div class="col-md-12 actionButtons">
               <div class="divider"></div>
               <button type="submit" class="btn btn-default btn-md" id="savePower">Next</button>
               <a href="#" class="btn btn-border btn-md">skip</a>
            </div>
         </div>
      </form>
      </div>
   </div>
</div>
</div>
</div>


<script>
  window.crystalKnowsDISCResponse = function (response) {
    console.log('Here is the personality JSON response:', response)
  }
</script>
@include('pages.js.planning_tools')

@endsection