<?php
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Recipt;
use App\Models\Ticket;

function urlGen($routes){
    return '/'.Auth::user()->role.$routes;
};

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Staff
Breadcrumbs::for('staff', function ($trail) {
    $trail->push('Staff', urlGen('/staff'));
});


// Staff > Add or Edit
Breadcrumbs::for('staffAdd', function ($trail,$type) {
    $trail->parent('staff');
    $trail->push(Str::ucfirst($type));
});

// Patients
Breadcrumbs::for('patient', function ($trail) {
    $trail->push('Patient', urlGen('/patient'));
});

// Patients > Add 
Breadcrumbs::for('PatientAE', function ($trail,$type) {
    $trail->parent('patient');
    if($type == ""){
        $type = "Profile";
    }
    $trail->push(Str::ucfirst($type));
});

// Patients > Profile
Breadcrumbs::for('patientProfile', function ($trail,$id) {
    $trail->parent('patient');
    $trail->push('Profile', urlGen('/patient/view/'.$id));
});


// Patients > Profile > Edit
Breadcrumbs::for('PatientEdit', function ($trail,$id) {
    $trail->parent('patientProfile',$id);
    $trail->push('Edit');
});


// Ticket
Breadcrumbs::for('ticket', function ($trail) {
    $trail->push('Ticket', route('ticket'));
});

// Patients > Profile > Reports
Breadcrumbs::for('reports', function ($trail,$id) {
    $trail->parent('patientProfile',$id);
    $trail->push('Reports');
});

// Patients > Profile > Reports > Add
Breadcrumbs::for('reportsA', function ($trail,$id) {
    $trail->parent('reports',$id);
    $trail->push('Add');
});

// Recipts
Breadcrumbs::for('reciptslist', function ($trail) {
    $trail->push('Recipts List', urlGen('/recipts'));
});

// Recipts > Patients
Breadcrumbs::for('reciptsPatients', function ($trail,$id) {
    $trail->parent('reciptslist');
    $trail->push('Patients List',urlGen('/recipts/view/'.$id));
});

// Recipts > Patients > Bill
Breadcrumbs::for('reciptsPatientsBill', function ($trail,$id) {
    $trail->parent('reciptsPatients',Recipt::find($id)->channel_id);
    $trail->push('Bill');
});

// Channels
Breadcrumbs::for('channels', function ($trail) {
    $trail->push('Channels', urlGen('/channels'));
});

// Channels > Add
Breadcrumbs::for('channelsA', function ($trail) {
    $trail->parent('channels');
    $trail->push('Add', urlGen('/channels/add'));
});

// Channels > Patient List
Breadcrumbs::for('channelsPlist', function ($trail,$id) {
    $trail->parent('channels');
    $trail->push('Patients', urlGen('/channels/view/'.$id));
});


// Channels > Patient List > Recipt
Breadcrumbs::for('channelsRecipt', function ($trail,$id) {
    $ticket = Ticket::find($id);
    $trail->parent('channelsPlist',$ticket->channel_id);
    $trail->push('Recipt', urlGen('/channels/recipts/add'.$ticket->id));
});


// Home > About
// Breadcrumbs::for('about', function ($trail) {
//     $trail->parent('home');
//     $trail->push('About', route('about'));
// });

// // Home > Blog
// Breadcrumbs::for('blog', function ($trail) {
//     $trail->parent('home');
//     $trail->push('Blog', route('blog'));
// });

// // Home > Blog > [Category]
// Breadcrumbs::for('category', function ($trail, $category) {
//     $trail->parent('blog');
//     $trail->push($category->title, route('category', $category->id));
// });

// // Home > Blog > [Category] > [Post]
// Breadcrumbs::for('post', function ($trail, $post) {
//     $trail->parent('category', $post->category);
//     $trail->push($post->title, route('post', $post->id));
// });