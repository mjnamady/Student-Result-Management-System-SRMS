<div class="vertical-menu">

    <div data-simplebar class="h-100">

        @php
            $adminData = App\Models\User::find(Auth::user()->id);
        @endphp

        <!-- User details -->
        <div class="user-profile text-center mt-3">
            <div class="">
                <img src="{{ empty($adminData->photo)? asset('uploads/no_image.jpg') : asset('uploads/admin_profile/'.$adminData->photo) }}" alt="" class="avatar-md rounded-circle">
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1" style="text-transform: capitalize"> {{ $adminData->name }} </h4>
                <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i> Online</span>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">MAIN CATEGORY</li>

                <li>
                    <a href="/dashboard" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="menu-title">APPEARANCE</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-profile-line"></i>
                        <span>Student Classes</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('create.class') }}">Create Class</a></li>
                        <li><a href="{{ route('manage.classes') }}">Manage Classes</a></li>
                        
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-profile-line"></i>
                        <span>Subjects</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('create.subject') }}">Create Subject</a></li>
                        <li><a href="{{ route('manage.subjects') }}">Manage Subjects</a></li>
                        <li><a href="{{ route('add.subject.combination') }}">Add Subject Combination</a></li>
                        <li><a href="{{ route('manage.subject.combination') }}">Mamage Subject Combination</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Students</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('add.student') }}">Add Student</a></li>
                        <li><a href="{{ route('manage.student') }}">Manage Students</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-profile-line"></i>
                        <span>Result</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('add.result') }}">Add Result</a></li>
                        <li><a href="{{ route('manage.result') }}">Manage Result</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>