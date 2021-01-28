<!-- ########## START: HEAD PANEL ########## -->
<div class="br-header">
    <div class="br-header-left">
        <div class="navicon-left hidden-md-down">
            <a id="btnLeftMenu" href="">
                <i class="icon ion-navicon-round"></i>
            </a>
        </div>
        <div class="navicon-left hidden-lg-up">
            <a id="btnLeftMenuMobile" href="">
                <i class="icon ion-navicon-round"></i>
            </a>
        </div>
        <div class="mt-3 ml-3">
            <h5>{{ get_greeting() }}, {{ Auth::user()->username }}</h5>
        </div>
    </div>
</div>
<!-- ########## END: HEAD PANEL ########## -->