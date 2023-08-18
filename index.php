<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="vendor/datatable.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="vendor/fontawesome.min.js" crossorigin="anonymous"></script>
        <script src="vendor/jquery.slim.min.js"></script>
        <script src="vendor/popper.min.js"></script>
        <script src="vendor/bootstrap.bundle.min.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-search"></i></div>
                                Search
                            </a>
                            <div class="sb-sidenav-menu-heading">Alerts</div>
                            <a class="nav-link" href="alerts.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-bell"></i></div>
                                Alerts
                            </a>
                            <div class="sb-sidenav-menu-heading">Special Requests</div>
                            <a class="nav-link" href="special.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                                Special Requests
                            </a>
                            <!-- <div class="sb-sidenav-menu-heading">Users</div>
                            <a class="nav-link" href="users.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Manage Users
                            </a> -->
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $_SESSION["username"];?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="mt-4">
                            <!-- Navbar Search-->
                            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0 w-100">
                                <textarea id="main_query" class="form-control w-100" style="min-height: 7rem" placeholder="Type text here..."></textarea>
                                <div class="d-flex align-items-end justify-content-end">
                                    <div id="demo" class="flex collapse filter-wrapper mr-auto flex-fill">
                                        <div class="row mt-4 mb-4">
                                            <div class="col-6">
                                                <div class="border p-4 rounded mb-2">
                                                    <div class="form-group my-2 d-flex align-items-center justify-content-center">
                                                        <label for="field1">Field 1:</label>
                                                        <input type="field1" class="form-control mx-2" id="full_name">
                                                    </div>
                                                    <div class="form-group my-2 d-flex align-items-center justify-content-center">
                                                        <label for="field2">Field 2:</label>
                                                        <input type="field2" class="form-control mx-2" id="speciality">
                                                    </div>
                                                    <div class="form-group my-2 d-flex align-items-center justify-content-center">
                                                        <label for="field3">Field 3:</label>
                                                        <input type="field3" class="form-control mx-2" id="centre">
                                                    </div>
                                                    <div class="form-group my-2 d-flex align-items-center justify-content-center">
                                                        <label for="field4">Field 4:</label>
                                                        <input type="field4" class="form-control mx-2" id="education">
                                                    </div>
                                                    <div class="form-group my-2 d-flex align-items-center justify-content-center">
                                                        <label for="field5">Field 5:</label>
                                                        <input type="field5" class="form-control mx-2" id="member">
                                                    </div>
                                                </div>
                                                <div class="d-flex border pt-3 px-4 py-2 rounded">
                                                    <div class="col-4">
                                                        <div class="form-check my-2">
                                                            <input class="form-check-input" type="checkbox" value="" id="is_top_priv" />
                                                            <label class="form-check-label" for="is_top_priv">CheckBox 1</label>
                                                        </div>
                                                        <div class="form-check my-2">
                                                            <input class="form-check-input" type="checkbox" value="" id="is_priv" />
                                                            <label class="form-check-label" for="is_priv">CheckBox 2</label>
                                                        </div>
                                                        <div class="form-check my-2">
                                                            <input class="form-check-input" type="checkbox" value="" id="is_harley_str" />
                                                            <label class="form-check-label" for="is_harley_str">CheckBox 3</label>
                                                        </div>
                                                        <div class="form-check my-2">
                                                            <input class="form-check-input" type="checkbox" value="" id="is_publication" />
                                                            <label class="form-check-label" for="is_publication">CheckBox 4</label>
                                                        </div>
                                                        <div class="form-check my-2">
                                                            <input class="form-check-input" type="checkbox" value="" id="is_triage" />
                                                            <label class="form-check-label" for="is_triage">CheckBox 5</label>
                                                        </div>     
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-check my-2">
                                                            <input class="form-check-input" type="checkbox" value="" id="is_docencia" />
                                                            <label class="form-check-label" for="is_docencia">CheckBox 6</label>
                                                        </div>
                                                        <div class="form-check my-2">
                                                            <input class="form-check-input" type="checkbox" value="" id="is_invest" />
                                                            <label class="form-check-label" for="is_invest">CheckBox 7</label>
                                                        </div>
                                                        <div class="form-check my-2">
                                                            <input class="form-check-input" type="checkbox" value="" id="is_foreign_train" />
                                                            <label class="form-check-label" for="is_foreign_train">CheckBox 8</label>
                                                        </div>
                                                        <div class="form-check my-2">
                                                            <input class="form-check-input" type="checkbox" value="" id="is_award" />
                                                            <label class="form-check-label" for="is_award">CheckBox 9</label>
                                                        </div>
                                                        <div class="form-check my-2">
                                                            <input class="form-check-input" type="checkbox" value="" id="is_ponente" />
                                                            <label class="form-check-label" for="is_ponente">CheckBox 10</label>
                                                        </div>                                                
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-check my-2">
                                                            <input class="form-check-input" type="checkbox" value="" id="is_presi_congr" />
                                                            <label class="form-check-label" for="is_presi_congr">CheckBox 11</label>
                                                        </div>
                                                        <div class="form-check my-2">
                                                            <input class="form-check-input" type="checkbox" value="" id="is_presi_society" />
                                                            <label class="form-check-label" for="is_presi_society">CheckBox 12</label>
                                                        </div>                                                
                                                        <div class="form-check my-2">
                                                            <input class="form-check-input" type="checkbox" value="" id="is_memb_society" />
                                                            <label class="form-check-label" for="is_memb_society">CheckBox 13</label>
                                                        </div>
                                                        <div class="form-check my-2">
                                                            <input class="form-check-input" type="checkbox" value="" id="is_phd" />
                                                            <label class="form-check-label" for="is_phd">CheckBox 14</label>
                                                        </div>                                                
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="d-flex">
                                                    <div class="form-group p-4 border rounded">
                                                        <label>Field 7:</label>
                                                        <div class="checkbox-wrapper mt-3" id="education_list">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="option1" />
                                                                <label class="form-check-label" for="option1">Option 1</label>
                                                            </div>
                                                            <div class="form-check my-2">
                                                                <input class="form-check-input" type="checkbox" value="" id="option2" />
                                                                <label class="form-check-label" for="option2">Option 2</label>
                                                            </div>
                                                            <div class="form-check my-2">
                                                                <input class="form-check-input" type="checkbox" value="" id="optioin3" />
                                                                <label class="form-check-label" for="optioin3">Option 3</label>
                                                            </div>
                                                            <div class="form-check my-2">
                                                                <input class="form-check-input" type="checkbox" value="" id="optioin4" />
                                                                <label class="form-check-label" for="optioin4">Option 4</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group p-4 border mx-4 rounded">
                                                        <label>Field 8:</label>
                                                        <div class="checkbox-wrapper mt-3" id="centre_list">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="option1" />
                                                                <label class="form-check-label" for="option1">Option 1</label>
                                                            </div>
                                                            <div class="form-check my-2">
                                                                <input class="form-check-input" type="checkbox" value="" id="option2" />
                                                                <label class="form-check-label" for="option2">Option 2</label>
                                                            </div>
                                                            <div class="form-check my-2">
                                                                <input class="form-check-input" type="checkbox" value="" id="optioin3" />
                                                                <label class="form-check-label" for="optioin3">Option 3</label>
                                                            </div>
                                                            <div class="form-check my-2">
                                                                <input class="form-check-input" type="checkbox" value="" id="optioin4" />
                                                                <label class="form-check-label" for="optioin4">Option 4</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group p-4 border rounded">
                                                        <label>Field 9:</label>
                                                        <div class="checkbox-wrapper mt-3" id="speciality_list">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="option1" />
                                                                <label class="form-check-label" for="option1">Option 1</label>
                                                            </div>
                                                            <div class="form-check my-2">
                                                                <input class="form-check-input" type="checkbox" value="" id="option2" />
                                                                <label class="form-check-label" for="option2">Option 2</label>
                                                            </div>
                                                            <div class="form-check my-2">
                                                                <input class="form-check-input" type="checkbox" value="" id="optioin3" />
                                                                <label class="form-check-label" for="optioin3">Option 3</label>
                                                            </div>
                                                            <div class="form-check my-2">
                                                                <input class="form-check-input" type="checkbox" value="" id="optioin4" />
                                                                <label class="form-check-label" for="optioin4">Option 4</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex mt-4">
                                                    <div class="form-group p-4 border rounded">
                                                        <label>Field 10:</label>
                                                        <div class="checkbox-wrapper mt-3" id="language">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="option1" />
                                                                <label class="form-check-label" for="option1">Option 1</label>
                                                            </div>
                                                            <div class="form-check my-2">
                                                                <input class="form-check-input" type="checkbox" value="" id="option2" />
                                                                <label class="form-check-label" for="option2">Option 2</label>
                                                            </div>
                                                            <div class="form-check my-2">
                                                                <input class="form-check-input" type="checkbox" value="" id="optioin3" />
                                                                <label class="form-check-label" for="optioin3">Option 3</label>
                                                            </div>
                                                            <div class="form-check my-2">
                                                                <input class="form-check-input" type="checkbox" value="" id="optioin4" />
                                                                <label class="form-check-label" for="optioin4">Option 4</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group p-4 border mx-4 rounded">
                                                        <label>Field 11:</label>
                                                        <div class="checkbox-wrapper mt-3" id="affiliations">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="option1" />
                                                                <label class="form-check-label" for="option1">Option 1</label>
                                                            </div>
                                                            <div class="form-check my-2">
                                                                <input class="form-check-input" type="checkbox" value="" id="option2" />
                                                                <label class="form-check-label" for="option2">Option 2</label>
                                                            </div>
                                                            <div class="form-check my-2">
                                                                <input class="form-check-input" type="checkbox" value="" id="optioin3" />
                                                                <label class="form-check-label" for="optioin3">Option 3</label>
                                                            </div>
                                                            <div class="form-check my-2">
                                                                <input class="form-check-input" type="checkbox" value="" id="optioin4" />
                                                                <label class="form-check-label" for="optioin4">Option 4</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="form-group my-3 d-flex align-items-center justify-content-center px-4 py-2 rounded border">
                                                    <label for="field6">Field 6:</label>
                                                    <div>
                                                        <div class="d-flex align-items-center justify-content-center mb-2">
                                                            <input type="text" class="form-control mx-2" id="field61">
                                                            <span> To </span>
                                                            <input type="text" class="form-control mx-2" id="field62">
                                                        </div>
                                                        <div class="d-flex align-items-center justify-content-center">
                                                            <input type="text" class="form-control mx-2" id="field63">
                                                            <span> To </span>
                                                            <input type="text" class="form-control mx-2" id="field64">
                                                        </div>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-end mb-4">
                                    <button class="btn btn-success ml-auto mx-2 mt-2" id="btnNavbarSearch" type="button" data-toggle="collapse" data-target="#demo"><i class="fas fa-plus"></i>Advanced Options</button>
                                    <button class="btn btn-success mt-2" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i> Search</button>
                                </div>
                            </form>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Search Result
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                        </tr>
                                        <tr>
                                            <td>Garrett Winters</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>63</td>
                                            <td>2011/07/25</td>
                                            <td>$170,750</td>
                                        </tr>
                                        <tr>
                                            <td>Ashton Cox</td>
                                            <td>Junior Technical Author</td>
                                            <td>San Francisco</td>
                                            <td>66</td>
                                            <td>2009/01/12</td>
                                            <td>$86,000</td>
                                        </tr>
                                        <tr>
                                            <td>Cedric Kelly</td>
                                            <td>Senior Javascript Developer</td>
                                            <td>Edinburgh</td>
                                            <td>22</td>
                                            <td>2012/03/29</td>
                                            <td>$433,060</td>
                                        </tr>
                                        <tr>
                                            <td>Airi Satou</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>33</td>
                                            <td>2008/11/28</td>
                                            <td>$162,700</td>
                                        </tr>
                                        <tr>
                                            <td>Brielle Williamson</td>
                                            <td>Integration Specialist</td>
                                            <td>New York</td>
                                            <td>61</td>
                                            <td>2012/12/02</td>
                                            <td>$372,000</td>
                                        </tr>
                                        <tr>
                                            <td>Herrod Chandler</td>
                                            <td>Sales Assistant</td>
                                            <td>San Francisco</td>
                                            <td>59</td>
                                            <td>2012/08/06</td>
                                            <td>$137,500</td>
                                        </tr>
                                        <tr>
                                            <td>Rhona Davidson</td>
                                            <td>Integration Specialist</td>
                                            <td>Tokyo</td>
                                            <td>55</td>
                                            <td>2010/10/14</td>
                                            <td>$327,900</td>
                                        </tr>
                                        <tr>
                                            <td>Colleen Hurst</td>
                                            <td>Javascript Developer</td>
                                            <td>San Francisco</td>
                                            <td>39</td>
                                            <td>2009/09/15</td>
                                            <td>$205,500</td>
                                        </tr>
                                        <tr>
                                            <td>Sonya Frost</td>
                                            <td>Software Engineer</td>
                                            <td>Edinburgh</td>
                                            <td>23</td>
                                            <td>2008/12/13</td>
                                            <td>$103,600</td>
                                        </tr>
                                        <tr>
                                            <td>Jena Gaines</td>
                                            <td>Office Manager</td>
                                            <td>London</td>
                                            <td>30</td>
                                            <td>2008/12/19</td>
                                            <td>$90,560</td>
                                        </tr>
                                        <tr>
                                            <td>Quinn Flynn</td>
                                            <td>Support Lead</td>
                                            <td>Edinburgh</td>
                                            <td>22</td>
                                            <td>2013/03/03</td>
                                            <td>$342,000</td>
                                        </tr>
                                        <tr>
                                            <td>Charde Marshall</td>
                                            <td>Regional Director</td>
                                            <td>San Francisco</td>
                                            <td>36</td>
                                            <td>2008/10/16</td>
                                            <td>$470,600</td>
                                        </tr>
                                        <tr>
                                            <td>Haley Kennedy</td>
                                            <td>Senior Marketing Designer</td>
                                            <td>London</td>
                                            <td>43</td>
                                            <td>2012/12/18</td>
                                            <td>$313,500</td>
                                        </tr>
                                        <tr>
                                            <td>Tatyana Fitzpatrick</td>
                                            <td>Regional Director</td>
                                            <td>London</td>
                                            <td>19</td>
                                            <td>2010/03/17</td>
                                            <td>$385,750</td>
                                        </tr>
                                        <tr>
                                            <td>Michael Silva</td>
                                            <td>Marketing Designer</td>
                                            <td>London</td>
                                            <td>66</td>
                                            <td>2012/11/27</td>
                                            <td>$198,500</td>
                                        </tr>
                                        <tr>
                                            <td>Paul Byrd</td>
                                            <td>Chief Financial Officer (CFO)</td>
                                            <td>New York</td>
                                            <td>64</td>
                                            <td>2010/06/09</td>
                                            <td>$725,000</td>
                                        </tr>
                                        <tr>
                                            <td>Gloria Little</td>
                                            <td>Systems Administrator</td>
                                            <td>New York</td>
                                            <td>59</td>
                                            <td>2009/04/10</td>
                                            <td>$237,500</td>
                                        </tr>
                                        <tr>
                                            <td>Bradley Greer</td>
                                            <td>Software Engineer</td>
                                            <td>London</td>
                                            <td>41</td>
                                            <td>2012/10/13</td>
                                            <td>$132,000</td>
                                        </tr>
                                        <tr>
                                            <td>Dai Rios</td>
                                            <td>Personnel Lead</td>
                                            <td>Edinburgh</td>
                                            <td>35</td>
                                            <td>2012/09/26</td>
                                            <td>$217,500</td>
                                        </tr>
                                        <tr>
                                            <td>Jenette Caldwell</td>
                                            <td>Development Lead</td>
                                            <td>New York</td>
                                            <td>30</td>
                                            <td>2011/09/03</td>
                                            <td>$345,000</td>
                                        </tr>
                                        <tr>
                                            <td>Yuri Berry</td>
                                            <td>Chief Marketing Officer (CMO)</td>
                                            <td>New York</td>
                                            <td>40</td>
                                            <td>2009/06/25</td>
                                            <td>$675,000</td>
                                        </tr>
                                        <tr>
                                            <td>Caesar Vance</td>
                                            <td>Pre-Sales Support</td>
                                            <td>New York</td>
                                            <td>21</td>
                                            <td>2011/12/12</td>
                                            <td>$106,450</td>
                                        </tr>
                                        <tr>
                                            <td>Doris Wilder</td>
                                            <td>Sales Assistant</td>
                                            <td>Sidney</td>
                                            <td>23</td>
                                            <td>2010/09/20</td>
                                            <td>$85,600</td>
                                        </tr>
                                        <tr>
                                            <td>Angelica Ramos</td>
                                            <td>Chief Executive Officer (CEO)</td>
                                            <td>London</td>
                                            <td>47</td>
                                            <td>2009/10/09</td>
                                            <td>$1,200,000</td>
                                        </tr>
                                        <tr>
                                            <td>Gavin Joyce</td>
                                            <td>Developer</td>
                                            <td>Edinburgh</td>
                                            <td>42</td>
                                            <td>2010/12/22</td>
                                            <td>$92,575</td>
                                        </tr>
                                        <tr>
                                            <td>Jennifer Chang</td>
                                            <td>Regional Director</td>
                                            <td>Singapore</td>
                                            <td>28</td>
                                            <td>2010/11/14</td>
                                            <td>$357,650</td>
                                        </tr>
                                        <tr>
                                            <td>Brenden Wagner</td>
                                            <td>Software Engineer</td>
                                            <td>San Francisco</td>
                                            <td>28</td>
                                            <td>2011/06/07</td>
                                            <td>$206,850</td>
                                        </tr>
                                        <tr>
                                            <td>Fiona Green</td>
                                            <td>Chief Operating Officer (COO)</td>
                                            <td>San Francisco</td>
                                            <td>48</td>
                                            <td>2010/03/11</td>
                                            <td>$850,000</td>
                                        </tr>
                                        <tr>
                                            <td>Shou Itou</td>
                                            <td>Regional Marketing</td>
                                            <td>Tokyo</td>
                                            <td>20</td>
                                            <td>2011/08/14</td>
                                            <td>$163,000</td>
                                        </tr>
                                        <tr>
                                            <td>Michelle House</td>
                                            <td>Integration Specialist</td>
                                            <td>Sidney</td>
                                            <td>37</td>
                                            <td>2011/06/02</td>
                                            <td>$95,400</td>
                                        </tr>
                                        <tr>
                                            <td>Suki Burks</td>
                                            <td>Developer</td>
                                            <td>London</td>
                                            <td>53</td>
                                            <td>2009/10/22</td>
                                            <td>$114,500</td>
                                        </tr>
                                        <tr>
                                            <td>Prescott Bartlett</td>
                                            <td>Technical Author</td>
                                            <td>London</td>
                                            <td>27</td>
                                            <td>2011/05/07</td>
                                            <td>$145,000</td>
                                        </tr>
                                        <tr>
                                            <td>Gavin Cortez</td>
                                            <td>Team Leader</td>
                                            <td>San Francisco</td>
                                            <td>22</td>
                                            <td>2008/10/26</td>
                                            <td>$235,500</td>
                                        </tr>
                                        <tr>
                                            <td>Martena Mccray</td>
                                            <td>Post-Sales support</td>
                                            <td>Edinburgh</td>
                                            <td>46</td>
                                            <td>2011/03/09</td>
                                            <td>$324,050</td>
                                        </tr>
                                        <tr>
                                            <td>Unity Butler</td>
                                            <td>Marketing Designer</td>
                                            <td>San Francisco</td>
                                            <td>47</td>
                                            <td>2009/12/09</td>
                                            <td>$85,675</td>
                                        </tr>
                                        <tr>
                                            <td>Howard Hatfield</td>
                                            <td>Office Manager</td>
                                            <td>San Francisco</td>
                                            <td>51</td>
                                            <td>2008/12/16</td>
                                            <td>$164,500</td>
                                        </tr>
                                        <tr>
                                            <td>Hope Fuentes</td>
                                            <td>Secretary</td>
                                            <td>San Francisco</td>
                                            <td>41</td>
                                            <td>2010/02/12</td>
                                            <td>$109,850</td>
                                        </tr>
                                        <tr>
                                            <td>Vivian Harrell</td>
                                            <td>Financial Controller</td>
                                            <td>San Francisco</td>
                                            <td>62</td>
                                            <td>2009/02/14</td>
                                            <td>$452,500</td>
                                        </tr>
                                        <tr>
                                            <td>Timothy Mooney</td>
                                            <td>Office Manager</td>
                                            <td>London</td>
                                            <td>37</td>
                                            <td>2008/12/11</td>
                                            <td>$136,200</td>
                                        </tr>
                                        <tr>
                                            <td>Jackson Bradshaw</td>
                                            <td>Director</td>
                                            <td>New York</td>
                                            <td>65</td>
                                            <td>2008/09/26</td>
                                            <td>$645,750</td>
                                        </tr>
                                        <tr>
                                            <td>Olivia Liang</td>
                                            <td>Support Engineer</td>
                                            <td>Singapore</td>
                                            <td>64</td>
                                            <td>2011/02/03</td>
                                            <td>$234,500</td>
                                        </tr>
                                        <tr>
                                            <td>Bruno Nash</td>
                                            <td>Software Engineer</td>
                                            <td>London</td>
                                            <td>38</td>
                                            <td>2011/05/03</td>
                                            <td>$163,500</td>
                                        </tr>
                                        <tr>
                                            <td>Sakura Yamamoto</td>
                                            <td>Support Engineer</td>
                                            <td>Tokyo</td>
                                            <td>37</td>
                                            <td>2009/08/19</td>
                                            <td>$139,575</td>
                                        </tr>
                                        <tr>
                                            <td>Thor Walton</td>
                                            <td>Developer</td>
                                            <td>New York</td>
                                            <td>61</td>
                                            <td>2013/08/11</td>
                                            <td>$98,540</td>
                                        </tr>
                                        <tr>
                                            <td>Finn Camacho</td>
                                            <td>Support Engineer</td>
                                            <td>San Francisco</td>
                                            <td>47</td>
                                            <td>2009/07/07</td>
                                            <td>$87,500</td>
                                        </tr>
                                        <tr>
                                            <td>Serge Baldwin</td>
                                            <td>Data Coordinator</td>
                                            <td>Singapore</td>
                                            <td>64</td>
                                            <td>2012/04/09</td>
                                            <td>$138,575</td>
                                        </tr>
                                        <tr>
                                            <td>Zenaida Frank</td>
                                            <td>Software Engineer</td>
                                            <td>New York</td>
                                            <td>63</td>
                                            <td>2010/01/04</td>
                                            <td>$125,250</td>
                                        </tr>
                                        <tr>
                                            <td>Zorita Serrano</td>
                                            <td>Software Engineer</td>
                                            <td>San Francisco</td>
                                            <td>56</td>
                                            <td>2012/06/01</td>
                                            <td>$115,000</td>
                                        </tr>
                                        <tr>
                                            <td>Jennifer Acosta</td>
                                            <td>Junior Javascript Developer</td>
                                            <td>Edinburgh</td>
                                            <td>43</td>
                                            <td>2013/02/01</td>
                                            <td>$75,650</td>
                                        </tr>
                                        <tr>
                                            <td>Cara Stevens</td>
                                            <td>Sales Assistant</td>
                                            <td>New York</td>
                                            <td>46</td>
                                            <td>2011/12/06</td>
                                            <td>$145,600</td>
                                        </tr>
                                        <tr>
                                            <td>Hermione Butler</td>
                                            <td>Regional Director</td>
                                            <td>London</td>
                                            <td>47</td>
                                            <td>2011/03/21</td>
                                            <td>$356,250</td>
                                        </tr>
                                        <tr>
                                            <td>Lael Greer</td>
                                            <td>Systems Administrator</td>
                                            <td>London</td>
                                            <td>21</td>
                                            <td>2009/02/27</td>
                                            <td>$103,500</td>
                                        </tr>
                                        <tr>
                                            <td>Jonas Alexander</td>
                                            <td>Developer</td>
                                            <td>San Francisco</td>
                                            <td>30</td>
                                            <td>2010/07/14</td>
                                            <td>$86,500</td>
                                        </tr>
                                        <tr>
                                            <td>Shad Decker</td>
                                            <td>Regional Director</td>
                                            <td>Edinburgh</td>
                                            <td>51</td>
                                            <td>2008/11/13</td>
                                            <td>$183,000</td>
                                        </tr>
                                        <tr>
                                            <td>Michael Bruce</td>
                                            <td>Javascript Developer</td>
                                            <td>Singapore</td>
                                            <td>29</td>
                                            <td>2011/06/27</td>
                                            <td>$183,000</td>
                                        </tr>
                                        <tr>
                                            <td>Donna Snider</td>
                                            <td>Customer Support</td>
                                            <td>New York</td>
                                            <td>27</td>
                                            <td>2011/01/25</td>
                                            <td>$112,000</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script>

            // Get Field 7, 8, 9, 10, 11 data from the API and display in the file
            function getFieldData() {
                $.ajax({
                    type: "GET",
                    url: "http://localhost:9000/action=GetTagvalues&fieldname=field7",
                    async: false,
                    success: function(res) {
                        // Write code to HTML
                    }
                })
                $.ajax({
                    type: "GET",
                    url: "http://localhost:9000/action=GetTagvalues&fieldname=field8",
                    async: false,
                    success: function(res) {
                        // Write code to HTML
                    }
                })
                $.ajax({
                    type: "GET",
                    url: "http://localhost:9000/action=GetTagvalues&fieldname=field9",
                    async: false,
                    success: function(res) {
                        // Write code to HTML
                    }
                })
                $.ajax({
                    type: "GET",
                    url: "http://localhost:9000/action=GetTagvalues&fieldname=field10",
                    async: false,
                    success: function(res) {
                        // Write code to HTML
                    }
                })
                $.ajax({
                    type: "GET",
                    url: "http://localhost:9000/action=GetTagvalues&fieldname=field11",
                    async: false,
                    success: function(res) {
                        // Write code to HTML
                    }
                })
            }
        </script>
        <script src="vendor/bootstrap.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="vendor/datatable.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
