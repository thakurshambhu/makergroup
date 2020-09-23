@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'profile'
])
<style>
    .msg {
    position: relative;
    padding: .75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: .25rem;
}
</style>
@section('content')
    <div class="content">
       
        <div class="row">
            
            <div class="col-md-12">
               
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __('Profile Information') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label class="col-md-3 col-form-label">Full Name :</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <div>{{ucfirst($profile_info[0]['name'])}}</div>

                                    </div>
                                   
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">Work Email :</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                         <div>{{ucfirst($profile_info[0]['email'])}}</div>

                                    </div>
                                   
                                </div>
                            </div>

                        <div class="row">
                                <label class="col-md-3 col-form-label">Company :</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                         <div>{{ucfirst($profile_info[0]['company'])}}</div>

                                    </div>
                                   
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-md-3 col-form-label">Division :</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <div>{{ucfirst($profile_info[0]['division'])}}</div>

                                    </div>
                                   
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-md-3 col-form-label">Title :</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <div>{{ucfirst($profile_info[0]['title'])}}</div>

                                    </div>
                                   
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-md-3 col-form-label">Manager's Name :</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <div>{{ucfirst($profile_info[0]['manager_name'])}}</div>

                                    </div>
                                    
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-md-3 col-form-label">Have you had negotiation training in the past? :</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                      <div>{{ucfirst($profile_info[0]['training'])}}</div>

                                    </div>
                                   
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-md-3 col-form-label">With Who? :</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                      <div>{{ucfirst($profile_info[0]['with_who'])}}</div>

                                    </div>
                                   
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">With Who? :</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                      <div>{{ucfirst($profile_info[0]['when'])}}</div>

                                    </div>
                                   
                                </div>
                            </div>


                            <div class="row">
                                <label class="col-md-3 col-form-label">Is negotiation a regular part of your job? :</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                         <div>{{ucfirst($profile_info[0]['negotiation'])}}</div>

                                    </div>
                                   
                                </div>
                            </div>
                            
                            <div class="row negotiation_details">
                                <label class="col-md-3 col-form-label">What companies do you negotiate with? :</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                         <div>{{ucfirst($profile_info[0]['negotiate_with'])}}</div>

                                    </div>
                                   
                                </div>
                                <label class="col-md-3 col-form-label">What are the typical variables/items that you negotiate over? :</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                         <div>{{ucfirst($profile_info[0]['variables'])}}</div>

                                    </div>
                                    
                                </div>
                            </div>


                            <div class="row">
                                <label class="col-md-3 col-form-label">Do you consider yourself a good negotiator? :</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <div>{{ucfirst($profile_info[0]['negotiator'])}}</div>

                                    </div>
                                    
                                </div>
                            </div>


                            <div class="negotiator_reason">
                                <div class="row why">
                                <label class="col-md-3 col-form-label">Why? :</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                         <div>{{ucfirst($profile_info[0]['why'])}}</div>
                                      
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="row why_not">
                                <label class="col-md-3 col-form-label">Why Not? :</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                          <div>{{ucfirst($profile_info[0]['why_not'])}}</div>

                                    </div>
                                    
                                </div>
                            </div>
                            </div>

                            <div class="row">
                                <label class="col-md-3 col-form-label">Do you enjoy negotiating? :</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                         <div>{{ucfirst($profile_info[0]['enjoy_negotiation'])}}</div>
                                    </div>
                                   
                                </div>
                            </div>

                            <div class="enjoy_reason">
                                <div class="row why_enjoy">
                                <label class="col-md-3 col-form-label">Why? :</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                         <div>{{ucfirst($profile_info[0]['why_enjoy'])}}</div>

                                        
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="why_not_enjoy row">
                                <label class="col-md-3 col-form-label">Why Not? :</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                         <div >{{ucfirst($profile_info[0]['why_not_enjoy'])}}</div>
                                    </div>
                                    
                                </div>
                                </div>
                            </div>
                        
                            <div class="row">
                                <label class="col-md-3 col-form-label">Name one thing you wish you could do better in order to become a more effective negotiator? :</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <div>{{ucfirst($profile_info[0]['effective_negotiator'])}}</div> 
                                    </div>
                                   
                                </div>
                            </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection