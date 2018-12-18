<div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-3 ml-auto">
        <form class="input-icon my-3 my-lg-0">
          <input type="search" class="form-control header-search" placeholder="Search&hellip;" tabindex="1">
          <div class="input-icon-addon">
            <i class="fe fe-search"></i>
          </div>
        </form>
      </div>
      @if (auth()->user()->is_admin)
        <div class="col-lg order-lg-first">
          <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
            <li class="nav-item">
              <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-user"></i> Etudiants</a>
              <div class="dropdown-menu dropdown-menu-arrow">
                <a href="{{ route('student.create') }}" class="dropdown-item ">Nouveau etudiant</a>
                <a href="{{ route('student.index') }}" class="dropdown-item ">Liste des etudaints</a>
              </div>
            </li>
            <li class="nav-item">
              <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-box"></i> Modules</a>
              <div class="dropdown-menu dropdown-menu-arrow">
                <a href="{{ route('module.create') }}" class="dropdown-item ">Nouveau module</a>
                <a href="{{ route('module.index') }}" class="dropdown-item ">Liste des modules</a>
              </div>
            </li>
            <li class="nav-item">
              <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-user"></i> Enseignants</a>
              <div class="dropdown-menu dropdown-menu-arrow">
                <a href="{{ route('teacher.create') }}" class="dropdown-item ">Nouveau enseignants</a>
                <a href="{{ route('teacher.index') }}" class="dropdown-item ">Liste des enseignants</a>
              </div>
            </li>
            <li class="nav-item">
              <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-box"></i> Filières</a>
              <div class="dropdown-menu dropdown-menu-arrow">
                <a href="{{ route('student.create') }}" class="dropdown-item ">Nouveau filière</a>
                <a href="{{ route('student.index') }}" class="dropdown-item ">Liste des filières</a>
              </div>
            </li>
            <li class="nav-item">
              <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-box"></i> Absences</a>
              <div class="dropdown-menu dropdown-menu-arrow">
                <a href="{{ route('absence.create') }}" class="dropdown-item ">Nouveau absence</a>
                <a href="{{ route('absence.index') }}" class="dropdown-item ">Liste des absences</a>
              </div>
            </li>
          </ul>
        </div>
      @else
        <div class="col-lg order-lg-first">
          <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
            <li class="nav-item">
              <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-box"></i> Absences</a>
              <div class="dropdown-menu dropdown-menu-arrow">
                <a href="{{ route('absence.create') }}" class="dropdown-item ">Nouveau absence</a>
                <a href="{{ route('absence.index') }}" class="dropdown-item ">Liste des absences</a>
              </div>
            </li>
          </ul>
        </div>
      @endif
    </div>
  </div>
</div>