<?php
include '../views/viewtop.php';
?>
<div class="page-content">

			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

			<div id="portlet-config" class="modal hide">

				<div class="modal-header">

					<button data-dismiss="modal" class="close" type="button"></button>

					<h3>portlet Settings</h3>

				</div>

				<div class="modal-body">

					<p>Here will be a configuration form</p>

				</div>

			</div>

			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

			<!-- BEGIN PAGE CONTAINER-->        

			<div class="container-fluid">

				<!-- BEGIN PAGE HEADER-->

				<div class="row-fluid">

					<div class="span12">

						<!-- BEGIN STYLE CUSTOMIZER -->

						<div class="color-panel hidden-phone">

							<div class="color-mode-icons icon-color"></div>

							<div class="color-mode-icons icon-color-close"></div>

							<div class="color-mode">

								<p>THEME COLOR</p>

								<ul class="inline">

									<li class="color-black current color-default" data-style="default"></li>

									<li class="color-blue" data-style="blue"></li>

									<li class="color-brown" data-style="brown"></li>

									<li class="color-purple" data-style="purple"></li>

									<li class="color-grey" data-style="grey"></li>

									<li class="color-white color-light" data-style="light"></li>

								</ul>

								<label>

									<span>Layout</span>

									<select class="layout-option m-wrap small">

										<option value="fluid" selected>Fluid</option>

										<option value="boxed">Boxed</option>

									</select>

								</label>

								<label>

									<span>Header</span>

									<select class="header-option m-wrap small">

										<option value="fixed" selected>Fixed</option>

										<option value="default">Default</option>

									</select>

								</label>

								<label>

									<span>Sidebar</span>

									<select class="sidebar-option m-wrap small">

										<option value="fixed">Fixed</option>

										<option value="default" selected>Default</option>

									</select>

								</label>

								<label>

									<span>Footer</span>

									<select class="footer-option m-wrap small">

										<option value="fixed">Fixed</option>

										<option value="default" selected>Default</option>

									</select>

								</label>

							</div>

						</div>

						<!-- END BEGIN STYLE CUSTOMIZER -->  

						<!-- BEGIN PAGE TITLE & BREADCRUMB-->

						<h3 class="page-title">

							Responsive Tables <small>responsive table samples</small>

						</h3>

						<ul class="breadcrumb">

							<li>

								<i class="icon-home"></i>

								<a href="index.html">Home</a> 

								<i class="icon-angle-right"></i>

							</li>

							<li>

								<a href="#">Data Tables</a>

								<i class="icon-angle-right"></i>

							</li>

							<li><a href="#">Responsive Tables</a></li>

						</ul>

						<!-- END PAGE TITLE & BREADCRUMB-->

					</div>

				</div>

				<!-- END PAGE HEADER-->

				<!-- BEGIN PAGE CONTENT-->          

				<div class="row-fluid">

					<div class="span12">

						<div class="alert alert-success">

							<button class="close" data-dismiss="alert"></button>

							Please try to re-size your browser window in order to see the tables in responsive mode.<br>

							<span class="label label-important">NOTE:</span>&nbsp;This feature is supported by Internet Explorer 10, Latest Firefox, Chrome, Opera and Safari

						</div>

						<!-- BEGIN SAMPLE TABLE PORTLET-->

						<div class="portlet box green">

							<div class="portlet-title">

								<div class="caption"><i class="icon-cogs"></i>Flip Scroll</div>

								<div class="tools">

									<a href="javascript:;" class="collapse"></a>

									<a href="#portlet-config" data-toggle="modal" class="config"></a>

									<a href="javascript:;" class="reload"></a>

									<a href="javascript:;" class="remove"></a>

								</div>

							</div>

							<div class="portlet-body flip-scroll">

								<table class="table-bordered table-striped table-condensed flip-content">

									<thead class="flip-content">

										<tr>

											<th>Code</th>

											<th>Company</th>

											<th class="numeric">Price</th>

											<th class="numeric">Change</th>

											<th class="numeric">Change %</th>

											<th class="numeric">Open</th>

											<th class="numeric">High</th>

											<th class="numeric">Low</th>

											<th class="numeric">Volume</th>

										</tr>

									</thead>

									<tbody>

										<tr >

											<td>AAC</td>

											<td>AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>

											<td class="numeric">$1.38</td>

											<td class="numeric">-0.01</td>

											<td class="numeric">-0.36%</td>

											<td class="numeric">$1.39</td>

											<td class="numeric">$1.39</td>

											<td class="numeric">$1.38</td>

											<td class="numeric">9,395</td>

										</tr>

										<tr>

											<td>AAD</td>

											<td>ARDENT LEISURE GROUP</td>

											<td class="numeric">$1.15</td>

											<td class="numeric">  +0.02</td>

											<td class="numeric">1.32%</td>

											<td class="numeric">$1.14</td>

											<td class="numeric">$1.15</td>

											<td class="numeric">$1.13</td>

											<td class="numeric">56,431</td>

										</tr>

										<tr>

											<td>AAX</td>

											<td>AUSENCO LIMITED</td>

											<td class="numeric">$4.00</td>

											<td class="numeric">-0.04</td>

											<td class="numeric">-0.99%</td>

											<td class="numeric">$4.01</td>

											<td class="numeric">$4.05</td>

											<td class="numeric">$4.00</td>

											<td class="numeric">90,641</td>

										</tr>

										<tr>

											<td>ABC</td>

											<td>ADELAIDE BRIGHTON LIMITED</td>

											<td class="numeric">$3.00</td>

											<td class="numeric">  +0.06</td>

											<td class="numeric">2.04%</td>

											<td class="numeric">$2.98</td>

											<td class="numeric">$3.00</td>

											<td class="numeric">$2.96</td>

											<td class="numeric">862,518</td>

										</tr>

										<tr>

											<td>ABP</td>

											<td>ABACUS PROPERTY GROUP</td>

											<td class="numeric">$1.91</td>

											<td class="numeric">0.00</td>

											<td class="numeric">0.00%</td>

											<td class="numeric">$1.92</td>

											<td class="numeric">$1.93</td>

											<td class="numeric">$1.90</td>

											<td class="numeric">595,701</td>

										</tr>

										<tr>

											<td>ABY</td>

											<td>ADITYA BIRLA MINERALS LIMITED</td>

											<td class="numeric">$0.77</td>

											<td class="numeric">  +0.02</td>

											<td class="numeric">2.00%</td>

											<td class="numeric">$0.76</td>

											<td class="numeric">$0.77</td>

											<td class="numeric">$0.76</td>

											<td class="numeric">54,567</td>

										</tr>

										<tr>

											<td>ACR</td>

											<td>ACRUX LIMITED</td>

											<td class="numeric">$3.71</td>

											<td class="numeric">  +0.01</td>

											<td class="numeric">0.14%</td>

											<td class="numeric">$3.70</td>

											<td class="numeric">$3.72</td>

											<td class="numeric">$3.68</td>

											<td class="numeric">191,373</td>

										</tr>

										<tr>

											<td>ADU</td>

											<td>ADAMUS RESOURCES LIMITED</td>

											<td class="numeric">$0.72</td>

											<td class="numeric">0.00</td>

											<td class="numeric">0.00%</td>

											<td class="numeric">$0.73</td>

											<td class="numeric">$0.74</td>

											<td class="numeric">$0.72</td>

											<td class="numeric">8,602,291</td>

										</tr>

										<tr>


											<td>AGG</td>

											<td>ANGLOGOLD ASHANTI LIMITED</td>

											<td class="numeric">$7.81</td>

											<td class="numeric">-0.22</td>

											<td class="numeric">-2.74%</td>

											<td class="numeric">$7.82</td>

											<td class="numeric">$7.82</td>

											<td class="numeric">$7.81</td>

											<td class="numeric">148</td>

										</tr>

										<tr>

											<td>AGK</td>

											<td>AGL ENERGY LIMITED</td>

											<td class="numeric">$13.82</td>

											<td class="numeric">  +0.02</td>

											<td class="numeric">0.14%</td>

											<td class="numeric">$13.83</td>

											<td class="numeric">$13.83</td>

											<td class="numeric">$13.67</td>

											<td class="numeric">846,403</td>

										</tr>

										<tr>

											<td>AGO</td>

											<td>ATLAS IRON LIMITED</td>

											<td class="numeric">$3.17</td>

											<td class="numeric">-0.02</td>

											<td class="numeric">-0.47%</td>

											<td class="numeric">$3.11</td>

											<td class="numeric">$3.22</td>

											<td class="numeric">$3.10</td>

											<td class="numeric">5,416,303</td>

										</tr>

									</tbody>

								</table>

							</div>

						</div>

						<!-- END SAMPLE TABLE PORTLET-->

						<!-- BEGIN SAMPLE TABLE PORTLET-->

						<div class="portlet box blue">

							<div class="portlet-title">

								<div class="caption"><i class="icon-cogs"></i>No More Tables</div>

								<div class="tools">

									<a href="javascript:;" class="collapse"></a>

									<a href="#portlet-config" data-toggle="modal" class="config"></a>

									<a href="javascript:;" class="reload"></a>

									<a href="javascript:;" class="remove"></a>

								</div>

							</div>

							<div class="portlet-body no-more-tables">

								<table class="table-bordered table-striped table-condensed cf">

									<thead class="cf">

										<tr>

											<th>Code</th>

											<th>Company</th>

											<th class="numeric">Price</th>

											<th class="numeric">Change</th>

											<th class="numeric">Change %</th>

											<th class="numeric">Open</th>

											<th class="numeric">High</th>

											<th class="numeric">Low</th>

											<th class="numeric">Volume</th>

										</tr>

									</thead>

									<tbody>

										<tr>

											<td data-title="Code">AAC</td>

											<td data-title="Company">AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>

											<td data-title="Price" class="numeric">$1.38</td>

											<td data-title="Change" class="numeric">-0.01</td>

											<td data-title="Change %" class="numeric">-0.36%</td>

											<td data-title="Open" class="numeric">$1.39</td>

											<td data-title="High" class="numeric">$1.39</td>

											<td data-title="Low" class="numeric">$1.38</td>

											<td data-title="Volume" class="numeric">9,395</td>

										</tr>

										<tr>

											<td data-title="Code">AAD</td>

											<td data-title="Company">ARDENT LEISURE GROUP</td>

											<td data-title="Price" class="numeric">$1.15</td>

											<td data-title="Change" class="numeric">  +0.02</td>

											<td data-title="Change %" class="numeric">1.32%</td>

											<td data-title="Open" class="numeric">$1.14</td>

											<td data-title="High" class="numeric">$1.15</td>

											<td data-title="Low" class="numeric">$1.13</td>

											<td data-title="Volume" class="numeric">56,431</td>

										</tr>

										<tr>

											<td data-title="Code">AAX</td>

											<td data-title="Company">AUSENCO LIMITED</td>

											<td data-title="Price" class="numeric">$4.00</td>

											<td data-title="Change" class="numeric">-0.04</td>

											<td data-title="Change %" class="numeric">-0.99%</td>

											<td data-title="Open" class="numeric">$4.01</td>

											<td data-title="High" class="numeric">$4.05</td>

											<td data-title="Low" class="numeric">$4.00</td>

											<td data-title="Volume" class="numeric">90,641</td>

										</tr>

										<tr>

											<td data-title="Code">ABC</td>

											<td data-title="Company">ADELAIDE BRIGHTON LIMITED</td>

											<td data-title="Price" class="numeric">$3.00</td>

											<td data-title="Change" class="numeric">  +0.06</td>

											<td data-title="Change %" class="numeric">2.04%</td>

											<td data-title="Open" class="numeric">$2.98</td>

											<td data-title="High" class="numeric">$3.00</td>

											<td data-title="Low" class="numeric">$2.96</td>

											<td data-title="Volume" class="numeric">862,518</td>

										</tr>

										<tr>

											<td data-title="Code">ABP</td>

											<td data-title="Company">ABACUS PROPERTY GROUP</td>

											<td data-title="Price" class="numeric">$1.91</td>

											<td data-title="Change" class="numeric">0.00</td>

											<td data-title="Change %" class="numeric">0.00%</td>

											<td data-title="Open" class="numeric">$1.92</td>

											<td data-title="High" class="numeric">$1.93</td>

											<td data-title="Low" class="numeric">$1.90</td>

											<td data-title="Volume" class="numeric">595,701</td>

										</tr>

										<tr>

											<td data-title="Code">ABY</td>

											<td data-title="Company">ADITYA BIRLA MINERALS LIMITED</td>

											<td data-title="Price" class="numeric">$0.77</td>

											<td data-title="Change" class="numeric">  +0.02</td>

											<td data-title="Change %" class="numeric">2.00%</td>

											<td data-title="Open" class="numeric">$0.76</td>

											<td data-title="High" class="numeric">$0.77</td>

											<td data-title="Low" class="numeric">$0.76</td>

											<td data-title="Volume" class="numeric">54,567</td>

										</tr>

										<tr>

											<td data-title="Code">ACR</td>

											<td data-title="Company">ACRUX LIMITED</td>

											<td data-title="Price" class="numeric">$3.71</td>

											<td data-title="Change" class="numeric">  +0.01</td>

											<td data-title="Change %" class="numeric">0.14%</td>

											<td data-title="Open" class="numeric">$3.70</td>

											<td data-title="High" class="numeric">$3.72</td>

											<td data-title="Low" class="numeric">$3.68</td>

											<td data-title="Volume" class="numeric">191,373</td>

										</tr>

										<tr>

											<td data-title="Code">ADU</td>

											<td data-title="Company">ADAMUS RESOURCES LIMITED</td>

											<td data-title="Price" class="numeric">$0.72</td>

											<td data-title="Change" class="numeric">0.00</td>

											<td data-title="Change %" class="numeric">0.00%</td>

											<td data-title="Open" class="numeric">$0.73</td>

											<td data-title="High" class="numeric">$0.74</td>

											<td data-title="Low" class="numeric">$0.72</td>

											<td data-title="Volume" class="numeric">8,602,291</td>

										</tr>

										<tr>

											<td data-title="Code">AGG</td>

											<td data-title="Company">ANGLOGOLD ASHANTI LIMITED</td>

											<td data-title="Price" class="numeric">$7.81</td>

											<td data-title="Change" class="numeric">-0.22</td>

											<td data-title="Change %" class="numeric">-2.74%</td>

											<td data-title="Open" class="numeric">$7.82</td>

											<td data-title="High" class="numeric">$7.82</td>

											<td data-title="Low" class="numeric">$7.81</td>

											<td data-title="Volume" class="numeric">148</td>

										</tr>

										<tr>

											<td data-title="Code">AGK</td>

											<td data-title="Company">AGL ENERGY LIMITED</td>

											<td data-title="Price" class="numeric">$13.82</td>

											<td data-title="Change" class="numeric">  +0.02</td>

											<td data-title="Change %" class="numeric">0.14%</td>

											<td data-title="Open" class="numeric">$13.83</td>

											<td data-title="High" class="numeric">$13.83</td>

											<td data-title="Low" class="numeric">$13.67</td>

											<td data-title="Volume" class="numeric">846,403</td>

										</tr>

										<tr>

											<td data-title="Code">AGO</td>

											<td data-title="Company">ATLAS IRON LIMITED</td>

											<td data-title="Price" class="numeric">$3.17</td>

											<td data-title="Change" class="numeric">-0.02</td>

											<td data-title="Change %" class="numeric">-0.47%</td>

											<td data-title="Open" class="numeric">$3.11</td>

											<td data-title="High" class="numeric">$3.22</td>

											<td data-title="Low" class="numeric">$3.10</td>

											<td data-title="Volume" class="numeric">5,416,303</td>

										</tr>

									</tbody>

								</table>

							</div>

						</div>

						<!-- END SAMPLE TABLE PORTLET-->

					</div>

				</div>

				<!-- END PAGE CONTENT-->

			</div>

			<!-- END PAGE CONTAINER-->

		</div>