	<div class="left main-sidebar">
	
		<div class="sidebar-inner leftscroll">

			<div id="sidebar-menu">
        
			<ul>

					<li class="submenu">
						<a class="<?php echo isset($class) && $class=='dashboard'? 'active' : ''; ?>"  href="<?php echo base_url().INDEX_PHP; ?>"><i class="fa fa-fw fa-tachometer"></i><span> Dashboard </span> </a>
                    </li>

                    <li class="submenu">
                        <a class="<?php echo isset($class) && $class=='courses'? 'active' : ''; ?>"  href="javascript:void(0);"><i class="fa fa-fw fa-book"></i> <span> Courses </span> <span class="menu-arrow"></span></a>
						<ul class="list-unstyled">
							<li><a href="<?php echo base_url().INDEX_PHP.'ftcinternational/coursesadd'; ?>">Add</a></li>
							<li><a href="<?php echo base_url().INDEX_PHP.'ftcinternational/coursesview'; ?>">View</a></li>
						</ul>
                    </li>
                    
                    <li class="submenu">
                        <a class="<?php echo isset($class) && $class=='units'? 'active' : ''; ?>"  href="javascript:void(0);"><i class="fa fa-fw fa-book"></i> <span> Units </span> <span class="menu-arrow"></span></a>
						<ul class="list-unstyled">
							<li><a href="<?php echo base_url().INDEX_PHP.'ftcinternational/unitadd'; ?>">Add</a></li>
							<li><a href="<?php echo base_url().INDEX_PHP.'ftcinternational/unitview'; ?>">View</a></li>
						</ul>
                    </li>



                    <li class="submenu">
                        <a class="<?php echo isset($class) && $class=='questions'? 'active' : ''; ?>"  href="javascript:void(0);"><i class="fa fa-fw fa-book"></i> <span> Questions </span> <span class="menu-arrow"></span></a>
						<ul class="list-unstyled">
							<li><a href="<?php echo base_url().INDEX_PHP.'ftcinternational/questionsadd'; ?>">Add</a></li>
							<li><a href="<?php echo base_url().INDEX_PHP.'ftcinternational/questionsview'; ?>">View</a></li>
						</ul>
                    </li>
					<li class="submenu">
                        <a class="<?php echo isset($class) && $class=='tests'? 'active' : ''; ?>"  href="javascript:void(0);"><i class="fa fa-fw fa-book"></i> <span> Tests </span> <span class="menu-arrow"></span></a>
						<ul class="list-unstyled">
							<li><a href="<?php echo base_url().INDEX_PHP.'ftcinternational/addtests'; ?>">Create Test</a></li>
							<li><a href="<?php echo base_url().INDEX_PHP.'ftcinternational/viewtests'; ?>">View Test</a></li>
						</ul>
                    </li>

                     <!-- <li class="submenu">
                        <a href="<?php //echo base_url().INDEX_PHP.'ftcinternational/tests'; ?>"><i class="fa fa-fw fa-book"></i><span> Tests </span> </a>
                    </li> -->
										                    
            </ul>

            <div class="clearfix"></div>

			</div>
        
			<div class="clearfix"></div>

		</div>

	</div>