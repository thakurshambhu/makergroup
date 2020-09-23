@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'dashboard'
])

@section('content')
<div class="content">
  <div id="messages">
   </div>
<div class="row">
                        <div class="col-md-12">
                           <div class="stepContainer">
                              <div class="stepHeader ">
                                 <h3>offer tracker</h3>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="stepTable  table-execute">
                                       <div class="tableContainer mb-4">
                                          <div class="table-responsive" id="removeTableRes">
                                             <table class="table table-bordered" id="yourDataTable">
                                                <thead class="thead-orange" id="yourTableHeaderOuter">
                                                   @if ($your_offer->isNotEmpty())
                                                   <th colspan="{{$your_offer_show['offer_length']+2}}">Yours</th>
                                                   @else
                                                   <th colspan="3">yours</th>
                                                   @endif
                                                </thead>
                                                <thead class="thead-light" id="yourTableHeaderInner">
                                                   <tr id="yourTableHeader">
                                                      <th scope="col" >Variable</th>
                                                      @if($your_offer->isEmpty())
                                                         <th scope="col" class="text-center text-nowrap offer-td"><a class="addYourMoreOffer"><span class="fas fa-plus-circle f12 mr-1"></span></a>Offer 1<a class="removeYourMoreOffer"><span class="fas fa-times-circle f12 ml-1"></span></a></th>
                                                      @else
                                                         @for($num=1;$num<=$your_offer_show['offer_length'];$num++)
                                                         <th scope="col" class="text-center text-nowrap offer-td"><a class="addYourMoreOffer"><span class="fas fa-plus-circle f12 mr-1"></span></a>Offer {{$num}}<a class="removeYourMoreOffer"><span class="fas fa-times-circle f12 ml-1"></span></a></th>
                                                      
                                                         @endfor
                                                      @endif
                                                      <th>aligned</th>
                                                   </tr>
                                                </thead>
                                                <tbody id="yourTableBody">
                                                   @if($your_offer->isEmpty())
                                                      <tr class="firstRow1" id="">
                                                      <td><a href="javascript:void(0);" class="btn addOfferRow" title="Add More Offer"><span class="fas fa-plus-circle f12 mr-1"></span></a><a href='javascript:void(0);' class="btn removeOfferRow" title="Remove Offer"><span class="fas fa-times-circle f12"></span></a><input type="text" class="form-control form-control-sm" id="your_variable1"></td>
                                                      <td><input type="text" id="your_offer1" class="form-control your_offer"></td>
                                                      <td><input type="text" id="your_aligned1" class="form-control"></td>
                                                   </tr>
                                                   @else
                                                      @foreach($your_offer as $my_offer)
                                                      <tr class="firstRow{{$my_offer->id}}" id="{{$my_offer->id}}">
                                                      <td><a href="javascript:void(0);" class="btn addOfferRow" title="Add More Offer"><span class="fas fa-plus-circle f12 mr-1"></span></a><a href='javascript:void(0);' class="btn removeOfferRow" title="Remove Offer"><span class="fas fa-times-circle f12"></span></a><input type="text" class="form-control form-control-sm" id="your_variable{{$my_offer->id}}" value="{{$my_offer->variables}}"></td>
                                                     @foreach(json_decode($my_offer->offer) as $data)
                                                      <td><input type="text" id="your_offer{{$my_offer->id}}" class="form-control your_offer" value="{{$data}}"></td>
                                                      @endforeach
                                                      <td><input type="text" id="your_aligned{{$my_offer->id}}" class="form-control" value="{{$my_offer->aligned}}"></td>
                                                     
                                                   </tr>
                                                      @endforeach
                                                   @endif
                                                  
                                                </tbody>
                                             </table>
                                          </div>
                                       </div>
                                       <h3 class="mb-3">Next Steps</h3>
                                          <div class="table-responsive">
                                             <table class="table table-bordered  ">
                                                <thead class="thead-light">
                                                   <tr>
                                                      <th scope="col" >Who</th>
                                                      <th scope="col" >What</th>
                                                      <th>When</th>
                                                   </tr>
                                                </thead>
                                                <tbody id="stepsTableBody">
                                                   @if($steps_offer->isEmpty())
                                                      <tr id="" class="step1">
                                                      <td><a href="javascript:void(0);" class="btn addStepsRow" title="Add More Step"><span class="fas fa-plus-circle f12 mr-1"></span></a><a href='javascript:void(0);' class="btn removeStepsRow" title="Remove Step"><span class="fas fa-times-circle f12"></span></a><input type="text" class="form-control who1"></td>
                                                      <td><input type="text" class="form-control what1"></td>
                                                      <td><input type="text" class="form-control when1"></td>
                                                   </tr>
                                                   @else
                                                      @foreach($steps_offer as $data)
                                                         <tr id="{{$data->id}}" class="step{{$data->id}}">
                                                      <td><a href="javascript:void(0);" class="btn addStepsRow" title="Add More Step"><span class="fas fa-plus-circle f12 mr-1"></span></a><a href='javascript:void(0);' class="btn removeStepsRow" title="Remove Step"><span class="fas fa-times-circle f12"></span></a><input type="text" class="form-control who{{$data->id}}" value="{{$data->who}}"></td>
                                                      <td><input type="text" class="form-control what{{$data->id}}" value="{{$data->what}}"></td>
                                                      <td><input type="text" class="form-control when{{$data->id}}" value="{{$data->when}}"></td>
                                                   </tr>
                                                      @endforeach
                                                   @endif
                                                   
                                                </tbody>
                                             </table>
                                          </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="stepTable  table-execute-next">
                                       <div class="tableContainer mb-4">
                                          <div class="tableContainer mb-4">
                                          <div class="table-responsive" id="removeTheirTableRes">
                                             <table class="table table-bordered" id="theirDataTable">
                                                <thead class="thead-orange" id="theirTableHeaderOuter">
                                                   @if($their_offer->isEmpty())
                                                   <th colspan="3">Theirs</th>
                                                   @else
                                                   <th class="text-nowrap" colspan="{{$their_offer_show['offer_length']+2}}">Theirs</th>
                                                   @endif
                                                </thead>
                                                <thead class="thead-light" id="theirTableHeaderInner">
                                                   <tr id="theirTableHeader">
                                                      <th scope="col" >Variable</th>
                                                       @if($their_offer->isEmpty())
                                                      <th scope="col" class="text-center text-nowrap offer-td"><a class="addTheirMoreOffer"><span class="fas fa-plus-circle f12 mr-1"></span></a>Offer 1<a class="removeTheirMoreOffer"><span class="fas fa-times-circle f12 ml-1"></span></a></th>
                                                      @else
                                                      
                                                         @for($num=1;$num<=$their_offer_show['offer_length'];$num++)
                                                      <th scope="col" class="text-center text-nowrap offer-td"><a class="addTheirMoreOffer"><span class="fas fa-plus-circle f12 mr-1"></span></a>Offer {{$num}}<a class="removeTheirMoreOffer"><span class="fas fa-times-circle f12 ml-1"></span></a></th>
                                                      @endfor
                                                      @endif
                                                      <th>aligned</th>
                                                   </tr>
                                                </thead>
                                                <tbody id="theirTableBody">
                                                  @if($their_offer->isEmpty())
                                                   <tr class="firstTheirRow1"id="">
                                                      <td><a href="javascript:void(0);" class="btn addTheirOfferRow" title="Add More Offer"><span class="fas fa-plus-circle f12 mr-1"></span></a><a href='javascript:void(0);' class="btn removeTheirOfferRow" title="Remove Offer"><span class="fas fa-times-circle f12"></span></a><input id="their_variable1" type="text" class="form-control form-control-sm"></td>
                                                      <td><input type="text" id="their_offer1" class="form-control their_offer"></td>
                                                      <td><input type="text" id="their_aligned1" class="form-control"></td>
                                                   </tr>
                                                  @else

                                                   @foreach($their_offer as $offer_data)
                                                       <tr class="firstTheirRow{{$offer_data->id}}"id="{{$offer_data->id}}">
                                                      <td><a href="javascript:void(0);" class="btn addTheirOfferRow" title="Add More Offer"><span class="fas fa-plus-circle f12 mr-1"></span></a><a href='javascript:void(0);' class="btn removeTheirOfferRow" title="Remove Offer"><span class="fas fa-times-circle f12"></span></a><input id="their_variable{{$offer_data->id}}" value="{{$offer_data->variables}}" type="text" class="form-control form-control-sm"></td>
                                                      @foreach(json_decode($offer_data->offer) as $data)
                                                      <td><input type="text" id="their_offer{{$offer_data->id}}" class="form-control their_offer" value="{{$data}}"></td>
                                                      @endforeach
                                                      <td><input type="text" id="their_aligned{{$offer_data->id}}" class="form-control" value="{{$offer_data->aligned}}"></td>
                                                   </tr>
                                                   @endforeach
                                                  @endif
                                                  
                                                </tbody>
                                             </table>
                                          </div>
                                       </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12 actionButtons">
                              <div class="divider"></div>
                              <a href="#" id="addMoreOffer" class="btn btn-default btn-md btn-block-sm">Next</a>
                              <a href="#" class="btn btn-border btn-md">skip</a>
                           </div>
                        </div>
                     </div>

</div>

@include('pages.js.planning_tools')
@endsection