<div>
    <ol class="breadcrumb " style="padding-left:16px !important">
        <li class="breadcrumb breadcrumb-item" style="padding-left:0 !important">Pages | </li>
        @if(isset($page))
            @if($page == "Home")
                {{ Breadcrumbs::render('home') }}
            @elseif($page == "Patient")
                {{ Breadcrumbs::render('patient') }}
            @elseif($page == "Staff")
                {{ Breadcrumbs::render('staff') }}
            @elseif($page == "patientAddView")
                {{ Breadcrumbs::render('PatientAE',$type) }}
            @elseif($page ==  "patientEditView")
                {{ Breadcrumbs::render('PatientEdit',$patientId) }}

            @elseif($page == "patientProfileView")
                {{ Breadcrumbs::render('patientProfile',$patientId) }}

            @elseif($page == "staffAddView" || $page == "staffEditView")
                {{ Breadcrumbs::render('staffAdd',$type) }}
            
            @elseif($page == "Accessdenide")
            
            @elseif($page == "Ticket")
                {{ Breadcrumbs::render('ticket') }}
            @elseif($page == "Channels")
                {{ Breadcrumbs::render('channels') }}

            @elseif($page == "channelAddView" || $page == "channelEditView" )
                {{ Breadcrumbs::render('channelsA') }}
            
            @elseif($page == "channelSingleView")
                {{ Breadcrumbs::render('channelsPlist',$channelID) }}
            
            @elseif($page == "reciptsAddView" || $page == "reciptsEditView")
                {{ Breadcrumbs::render('channelsRecipt',$ticketID) }}
            
            @elseif($page == "Recipts")
                {{ Breadcrumbs::render('reciptslist') }}

            @elseif($page == "reciptsView")
                {{ Breadcrumbs::render('reciptsPatients',$channelID) }}

            @elseif($page == "reciptsStaff")
                {{ Breadcrumbs::render('reciptsPatientsBill',$reciptID) }}

            @elseif($page == "reportsAddView")
                {{ Breadcrumbs::render('reportsA',$patientId) }}
            @endif
        @endif
    </ol>
</div>