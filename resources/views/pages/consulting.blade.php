@extends('layouts.main')
@section('content')
  
<section class="fromation-style">
    <div class="container ">
      <div class="row">
        <div class="col-12">
          <h1 class="page-title">Consulting &amp; <span>Advisorship</span> </h1>
        </div> 
      </div>

      <div class="row mobile-center-text">
        <div class="col-12 col-md-6 d-flex align-items-center content-style-frame flex-column spaceTB30">
          <p>Helping our clients get the best deal possible, full stop. Our goal is to maximize the value proposition in any deal by applying our rigorous process-based methodology in combination with tried and tested behavioral strategies. Our consulting propositions are bespoke, deal specific solutions for each individual client built around their needs.</p>

          <p>Broadly speaking, we work alongside our clients in two primary fashions; from an organizational development perspective and from a tactical execution perspective.​</p>
          
          <p>Organizationally, we work hand in hand with our clients to help develop a culture of negotiation within an organization. Ensuring that each and every employee has the appropriate skills, knowledge and tools to execute to their meximum effectiveness.</p>
          
          <p>Tactically, consulting engagements will be targeted to specific problems, opportunities or challenges facing a client. Our 8 step process serves as the foundation and methodology for most tactical work with a structure that provides clarity of action, confidence in execution and certainty in results. Following the process, we work with our clients to develop the most effective, robust and thorough negotiation strategies possible, regardless of the challenges being faced.</p>
          <p>When teams are well prepared and fully aligned to both internal and extrenal goals, they are more confidant, and confidant teams secure better results. </p>
          
          <p>Maximizing deal outcomes requires a mind shift in thinking for most organizations. Change takes time. We're here to help. </p>
        </div>
        <div class="col-12 col-md-6 spaceTB30">
          <img src="{{ asset('/landing_page/images/')}}/8-step-process-graphic.jpg" class="img-fluid" />
        </div>       
      </div>
  </section>

<script>
  // $(document).ready(function() {
  //   $('.spaceTB30').filter(function() {
  //       return $(this).html().indexOf('&#8203;') != -1;
  //   }).remove();

  // });

</script>


  @endsection