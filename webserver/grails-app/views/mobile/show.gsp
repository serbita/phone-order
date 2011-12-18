
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="layout" content="main-mobile" />        
        <title>Pedidos</title>
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

 	<!--  end top-search -->
 	<div class="clear"></div>

</div>
<!-- End: page-top -->

</div>
<!-- End: page-top-outer -->

<div class="clear">&nbsp;</div>    

<div id="content-outer">

<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Pedidos</h1>
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
				
					<g:if test="${error}">
						<div class="message">
							<p>${error}</p>
							<g:eachError><p>${it.defaultMessage}</p></g:eachError>
						</div>
					</g:if>
					<g:else>		 		

				        <div>
			                        
				            <g:form action="save" >
				            <g:hiddenField name="itemId" value="${itemInstance?.id}" />
				            <g:hiddenField name="tableId" value="${tableInstance?.id}" />
				            <div class="dialog">            
				                <table border="0" width="100%" cellpadding="0" cellspacing="0" id="item-table">

				                        <tr class="even">
				                            <td class="table-item-col-repeat">Item</td>
				                            
				                            <td>${fieldValue(bean: itemInstance, field: "title")}</td>
				                            
				                        </tr>
				                        
				                        <tr class="alternate-row">
				                            <td class="table-item-col-repeat">Precio</td>
				                            
				                            <td>${fieldValue(bean: itemInstance, field: "price")}</td>
				                            
				                        </tr>                        
				                        
				                        <tr class="even">
				                            <td class="table-item-col-repeat">Cantidad</td>
				                            
				                            <td>
<!--				                            	<g:textField name="quantity" value="1" />-->				                            		
					                            	<select name="quantity">
					                            		<option selected="selected">1</option>
					                            		<option>2</option>
					                            		<option>3</option>
					                            		<option>4</option>
					                            		<option>5</option>
					                            		<option>6</option>
					                            		<option>7</option>
					                            		<option>8</option>
					                            		<option>9</option>
					                            		<option>10</option>
					                            	</select>

				                            		
				                            </td>
				                            
				                        </tr>                        
				                    
				                </table>
				            </div>
				            <div>    
				                    <span class="button"><g:submitButton name="order" value="Enviar pedido" class="submitButton" /></span>
				                   
				            </div>
				            </g:form>
				        </div>			 
				</g:else>
					
			</div>
				
			

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
        
    </body>
</html>
