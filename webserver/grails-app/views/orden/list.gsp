<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="layout" content="main2" />
        <g:set var="entityName" value="${message(code: 'orden.label', default: 'Orden')}" />
        <title><g:message code="default.list.label" args="[entityName]" /></title>
        <g:javascript library="jquery" plugin="jquery"/>
        <jqui:resources theme="darkness" />
    </head>
    <body>
    
<!-- Start: page-top-outer -->
<div id="page-top-outer">    

<!-- Start: page-top -->
<div id="page-top">

	<!-- start logo -->
	<div id="logo">
	<a href=""><img src="/images/shared/logo.png" width="156" height="40" alt="" /></a>
	</div>
	<!-- end logo -->
	
	<!--  start top-search -->
	<div id="top-search">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
		<td><input type="text" value="Search" onblur="if (this.value=='') { this.value='Search'; }" onfocus="if (this.value=='Search') { this.value=''; }" class="top-search-inp" /></td>
		<td>
		<select  class="styledselect">
			<option value=""> All</option>
			<option value=""> Products</option>
		</select> 
		</td>
		<td>
		<input type="image" src="/images/shared/top_search_btn.gif"  />
		</td>
		</tr>
		</table>
	</div>
 	<!--  end top-search -->
 	<div class="clear"></div>

</div>
<!-- End: page-top -->

</div>
<!-- End: page-top-outer -->

<div class="clear">&nbsp;</div>
 
<!--  start nav-outer-repeat................................................................................................. START -->
<div class="nav-outer-repeat"> 
<!--  start nav-outer -->
<div class="nav-outer"> 

		<!-- start nav-right -->
		<div id="nav-right">
		
			<div class="nav-divider">&nbsp;</div>
			<div class="showhide-account"><img src="/images/shared/nav/nav_myaccount.gif" width="93" height="14" alt="" /></div>
			<div class="nav-divider">&nbsp;</div>
			<a href="" id="logout"><img src="/images/shared/nav/nav_logout.gif" width="64" height="14" alt="" /></a>
			<div class="clear">&nbsp;</div>
		
			<!--  start account-content -->	
			<div class="account-content">
			<div class="account-drop-inner">
				<a href="" id="acc-settings">Settings</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-details">Personal details </a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-project">Project details</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-inbox">Inbox</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-stats">Statistics</a> 
			</div>
			</div>
			<!--  end account-content -->
		
		</div>
		<!-- end nav-right -->


		<!--  start nav -->
		<div class="nav">
		<div class="table">
		
		<ul class="select"><li><a href="#nogo"><b>Dashboard</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub">
			<ul class="sub">
				<li><a href="#nogo">Dashboard Details 1</a></li>
				<li><a href="#nogo">Dashboard Details 2</a></li>
				<li><a href="#nogo">Dashboard Details 3</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		                    
		<ul class="current"><li><a href="#nogo"><b>Products</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub show">
			<ul class="sub">
				<li><a href="#nogo">View all products</a></li>
				<li class="sub_show"><a href="#nogo">Ordenes</a></li>
				<li><a href="#nogo">Delete products</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="clear"></div>
		</div>
		<div class="clear"></div>
		</div>
		<!--  start nav -->

</div>
<div class="clear"></div>
<!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................................................... END -->

 <div class="clear"></div>
 
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Ordenes</h1>
	</div>
	<!-- end page-heading -->

	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="/images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="/images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
			
	
		 
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">				
				<tr>
					<th class="table-header-repeat line-left"><a href="">Id</a></th>
					<th class="table-header-repeat line-left"><a href="">Fecha</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Item</a>	</th>				

					<th class="table-header-repeat line-left minwidth-1"><a href="">Cantidad</a></th>
					<th class="table-header-repeat line-left"><a href="">Precio</a></th>
					<th class="table-header-repeat line-left"><a href="">Total</a></th>
					<th class="table-header-repeat line-left"><a href="">Estado</a></th>
					<th class="table-header-options line-left"><a href="">Cambiar estado</a></th>
				</tr>
                    <g:each in="${ordenInstanceList}" status="i" var="ordenInstance">
                        <tr class="${(i % 2) == 0 ? 'alternate-row' : 'even'}">
                        
                            <td><g:link action="show" id="${ordenInstance.id}">${fieldValue(bean: ordenInstance, field: "id")}</g:link></td>
                            <td>${fieldValue(bean: ordenInstance, field: "dateCreated")}</td>

                            <td>${fieldValue(bean: ordenInstance, field: "item.title")}</td>
                            <td>${fieldValue(bean: ordenInstance, field: "quantity")}</td>
                            <td>${fieldValue(bean: ordenInstance, field: "unit_price")}</td>                                                    
                            <td>${fieldValue(bean: ordenInstance, field: "total_amount")}</td>
                            <td>
                                <div id="status_${ordenInstance.id}">${fieldValue(bean: ordenInstance, field: "status")}
                                </div>
                            </td>
                            <td class="options-width">
                                <div id="action_${ordenInstance.id}">
                                        <g:if test="${ordenInstance.status == 'Pending'}">
                                                <a href="#" onclick="javascript:changeStatus(${ordenInstance.id},'Delivered');" title="Cambiar a Entregado" class="icon-5 info-tooltip"></a>
                                        </g:if>
                                        <g:if test="${ordenInstance.status == 'Delivered'}">
                                                <a href="#" onclick="javascript:changeStatus(${ordenInstance.id},'Pending');" title="Cambiar a Pendiente" class="icon-2 info-tooltip"></a>
                                        </g:if>
                       		</div> 
                                                                     		
                            </td> 
<%--                             <td>${fieldValue(bean: ordenInstance, field: "collectorUser")}</td>  --%>                                                   
                        </tr>
                    </g:each>				
		
				
				</table>
				<!--  end product-table................................... --> 
				</form>
			</div>
<!--a href="#" onclick="javascript:changeStatus(1,'Delivered');" title="Cambiar a Entregado" >1 a delivered</a><br -->
<!--a href="#" onclick="javascript:changeStatus(1,'Pending');" title="Cambiar a Entregado" >1 a pending</a><br-->
<!--a href="#" onclick="javascript:changeStatus(2,'Delivered');" title="Cambiar a Entregado" >2 a delivered</a><br-->
<!--a href="#" onclick="javascript:changeStatus(2,'Pending');" title="Cambiar a Entregado" >2 a pending</a-->
			<!--  end content-table  -->
		
			<!--  start actions-box ............................................... -->
			<div id="actions-box">
				<a href="" class="action-slider"></a>
				<div id="actions-box-slider">
					<a href="" class="action-edit">Edit</a>
					<a href="" class="action-delete">Delete</a>
				</div>
				<div class="clear"></div>
			</div>
			<!-- end actions-box........... -->
			
			<!--  start paging..................................................... -->
			<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			<td>
				<a href="" class="page-far-left"></a>
				<a href="" class="page-left"></a>
				<div id="page-info">Page <strong>1</strong> / 15</div>
				<a href="" class="page-right"></a>
				<a href="" class="page-far-right"></a>
			</td>
			<td>
			<select  class="styledselect_pages">
				<option value="">Number of rows</option>
				<option value="">1</option>
				<option value="">2</option>
			</select>
			</td>
			</tr>
			</table>
			<!--  end paging................ -->
			
			<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>
	<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>
    
<!-- start footer -->         
<div id="footer">
	<!--  start footer-left -->
	<div id="footer-left">SerCompany </div>
	<!--  end footer-left -->
	<div class="clear">&nbsp;</div>
</div>
<!-- end footer -->
    
    
    
        
            <div class="paginateButtons">
                <g:paginate total="${ordenInstanceTotal}" />
            </div>



        <script type="text/javascript">
        function changeStatus(id,status) {
            $.ajax({
                    url: "changeStatus",
                    data: "id=" + id + "&status=" + status,
                    success: function(statusReturned) {
                		$("#status_" + id).html(statusReturned);
var local_status;
var local_class;
if (statusReturned == 'Delivered') {
        local_status = 'Pending';
local_class = 'icon-2 info-tooltip';
local_title = 'Cambiar a Pendiente';
                } else {
local_status = 'Delivered';
local_class = 'icon-5 info-tooltip'
local_title = 'Cambiar a Entredado';
}

                		$("#action_" + id).html('<a href="#" onclick="javascript:changeStatus('+id+',\''+local_status+'\');"  class="'+local_class+'" title="'+local_title+'" ></a>');
                    }
                  });
               };
        </script>

    </body>
</html>
