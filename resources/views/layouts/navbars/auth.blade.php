<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="{{ route('home') }}" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('paper') }}/img/brand_logo.jpg">
            </div>
        </a>
        <a href="{{ route('home') }}" class="simple-text logo-normal">
            {{ __('The Maker Group') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            @if(auth()->user()->complete_profile == "1")
            <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'dashboard') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Dashboard') }} </p>
                </a>
            </li>
            @endif

            <!-- Admin Section -->
            @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2 )
            <li class="{{ $elementActive == 'user' || $elementActive == 'admin' || $elementActive == 'profile' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#user_nav">
                    <i class="fa fa-users"></i>
                    <p>
                            {{ __('Users') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="user_nav">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'profile' ? 'active' : '' }}">
                            <a href="{{ route('profile.edit') }}">
                                <!-- <span class="sidebar-mini-icon">{{ __('UP') }}</span> -->
                                <span class="sidebar-normal">{{ __(' User Profile ') }}</span>
                            </a>
                        </li>
                        @if(auth()->user()->complete_profile == "1")
                        <li class="{{ $elementActive == 'user' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'user') }}">
                                <!-- <span class="sidebar-mini-icon">{{ __('U') }}</span> -->
                                <span class="sidebar-normal">{{ __(' User Management ') }}</span>
                            </a>
                        </li>
                        @endif
                        @if(auth()->user()->complete_profile == "1")
                        <li class="{{ $elementActive == 'user' ? 'active' : '' }}">
                            <a href="{{ route('newaccounts') }}">
                                <!-- <span class="sidebar-mini-icon">{{ __('U') }}</span> -->
                                <span class="sidebar-normal">New Accounts</span>
                            </a>
                        </li>
                        @endif
                        @if(auth()->user()->complete_profile == "1")
                        <li class="{{ $elementActive == 'admin' ? 'active' : '' }}">
                            <a href="{{ route('addAdmin') }}">
                                <!-- <span class="sidebar-mini-icon">{{ __('U') }}</span> -->
                                <span class="sidebar-normal">{{ __(' Admin Management ') }}</span>
                            </a>
                        </li>
                        @endif
                        @if(auth()->user()->role_id == 1)
                         <li class="{{ $elementActive == 'admin' ? 'active' : '' }}">
                            <a href="{{ route('masterpassword') }}">
                                <!-- <span class="sidebar-mini-icon">{{ __('U') }}</span> -->
                                <span class="sidebar-normal">Master Password</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </li>


            @if(auth()->user()->complete_profile == "1")
            <li class="{{ $elementActive == 'add_batch' || $elementActive == 'list_batches' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#batch_nav">
                    <i class="fa fa-user-plus"></i>
                    <p>
                            {{ __('Workshops') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="batch_nav">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'add_batch' ? 'active' : '' }}">
                            <a href="{{route('getBatchForm')}}">
                                <!-- <span class="sidebar-mini-icon">{{ __('AB') }}</span> -->
                                <span class="sidebar-normal">{{ __(' Add Workshop') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'list_batches' ? 'active' : '' }}">
                            <a href="{{route('showBatch')}}">
                                <!-- <span class="sidebar-mini-icon">{{ __('LB') }}</span> -->
                                <span class="sidebar-normal">{{ __(' List Workshop') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endif
            @if(auth()->user()->complete_profile == "1")
            <li class="{{ $elementActive == 'add_question' || $elementActive == 'list_questions' ?
            'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#question_nav">
                    <i class="fa fa-question"></i>
                    <p>
                            {{ __('Questionnaire') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="question_nav">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'list_questions' ? 'active' : '' }}">
                            <a href="{{ route('showQuestions') }}">
                               <!--  <span class="sidebar-mini-icon">{{ __('LQ') }}</span> -->
                                <span class="sidebar-normal">{{ __(' List Questions ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'add_question' ? 'active' : '' }}">
                            <a href="{{ route('getAddQuestionForm') }}">
                                <!-- <span class="sidebar-mini-icon">{{ __('AQ') }}</span> -->
                                <span class="sidebar-normal">{{ __(' Add Questions ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            @endif
            @if(auth()->user()->complete_profile == "1")
            <li class="{{ $elementActive == 'add_team' || $elementActive == 'list_teams' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#team_nav">
                    <i class="fa fa-handshake-o"></i>
                    <p>
                            {{ __('Teams') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="team_nav">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'add_team' ? 'active' : '' }}">
                            <a href="{{route('addTeamForm')}}">
                                <!-- <span class="sidebar-mini-icon">{{ __('AT') }}</span> -->
                                <span class="sidebar-normal">{{ __(' Add Team') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'list_teams' ? 'active' : '' }}">
                            <a href="{{route('listTeams')}}">
                                <!-- <span class="sidebar-mini-icon">{{ __('LT') }}</span> -->
                                <span class="sidebar-normal">{{ __(' List Teams') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endif
            @if(auth()->user()->complete_profile == "1")
              <li class="{{ $elementActive == 'contactform' ? 'active' : '' }}">
                <a href="{{ route('getGamePage') }}">
                    <i class="nc-icon nc-tile-56"></i>
                    <p>{{ __('Bidding Game') }}</p>
                </a>
            </li>

            <li class="{{ $elementActive == 'contactform' ? 'active' : '' }}">
                <a href="{{ route('playbackGamePage') }}">
                    <i class="nc-icon nc-tile-56"></i>
                    <p>{{ __('Playback Bidding Game') }}</p>
                </a>
            </li>

            <li class="{{ $elementActive == 'list_details_page' || $elementActive == 'list_pages' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#pages_nav">
                    <i class="fa fa-file"></i>
                    <p>
                            {{ __('Pages') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="pages_nav">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'list_pages' ? 'active' : '' }}">
                            <a href="{{ route('showPages') }}">
                                <!-- <span class="sidebar-mini-icon">{{ __('HPC') }}</span> -->
                                <span class="sidebar-normal">{{ __(' Home Page Content ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'list_details_page' ? 'active' : '' }}">
                            <a href="{{ route('detailPageList') }}">
                                <!-- <span class="sidebar-mini-icon">{{ __('LDP') }}</span> -->
                                <span class="sidebar-normal">{{ __(' List Details Page') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="{{ $elementActive == 'list_reports' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#report_nav">
                    <i class="fa fa-file"></i>
                    <p>
                            {{ __('Reports') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="report_nav">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'list_reports' ? 'active' : '' }}">
                            <a href="{{ route('getReportPage') }}">
                                <!-- <span class="sidebar-mini-icon">{{ __('LR') }}</span> -->
                                <span class="sidebar-normal">{{ __(' List Reports ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endif
            @endif

            <!-- User's Section -->
             @if(auth()->user()->role_id == 3)

             <li class="{{ $elementActive == 'user' || $elementActive == 'profile' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#user_nav">
                    <i class="fa fa-users"></i>
                    <p>
                            {{ __('Profile') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="user_nav">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'profile' ? 'active' : '' }}">
                            <a href="{{ route('profile.edit') }}">
                                <!-- <span class="sidebar-mini-icon">{{ __('UP') }}</span> -->
                                <span class="sidebar-normal">{{ __('Profile ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!--  <div class="collapse show" id="user_nav">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'complete_profile' ? 'active' : '' }}">
                            <a href="{{ route('profile.edit') }}">
                                <span class="sidebar-mini-icon">{{ __('CP') }}</span>
                                <span class="sidebar-normal">{{ __('Complete Profile ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div> -->
            </li>
            @if(auth()->user()->complete_profile == "1")
            <li class="{{ $elementActive == 'contactform' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'contactform') }}">
                    <i class="nc-icon nc-tile-56"></i>
                    <p>{{ __('Contact Us') }}</p>
                </a>
            </li>
            @endif
            @endif
        </ul>
    </div>
</div>