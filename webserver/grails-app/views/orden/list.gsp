

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="layout" content="main" />
        <g:set var="entityName" value="${message(code: 'orden.label', default: 'Orden')}" />
        <title><g:message code="default.list.label" args="[entityName]" /></title>
        <g:javascript library="jquery" plugin="jquery"/>
    </head>
    <body>
        <div class="nav">
            <span class="menuButton"><a class="home" href="${createLink(uri: '/')}"><g:message code="default.home.label"/></a></span>
            <span class="menuButton"><g:link class="create" action="create"><g:message code="default.new.label" args="[entityName]" /></g:link></span>
        </div>
        <div class="body">
            <h1><g:message code="default.list.label" args="[entityName]" /></h1>
            <g:if test="${flash.message}">
            <div class="message">${flash.message}</div>
            </g:if>
		<div id="filter" class="filter">
	        <form action="list">
	        	<div>
		        	<span>Estado:</span>
		        	<span>
		        		<g:if test="${statusFilter == null}"><g:set var="statusFilter" value="All"/></g:if>
			        	<select name="statusFilter">
			        		<g:if test="${statusFilter == 'All'}"><option value="All" selected="selected">Todos</option></g:if><g:else><option value="All">Todos</option></g:else>
			        		<g:if test="${statusFilter == 'Pending'}"><option value="Pending" selected="selected">Pendiente</option></g:if><g:else><option value="Pending">Pendiente</option></g:else>
			        		<g:if test="${statusFilter == 'Delivered'}"><option value="Delivered" selected="selected">Entregado</option></g:if><g:else><option value="Delivered">Entregado</option></g:else>
			        	</select>
		        	</span>
		        </div>
	        	<div>
		        	<span>Mesa:</span>
		        	<span>
			        	<input name="tableFilter" type="text" value="${tableFilter}"></input>
		        	</span>
		        </div>
	        	<div>
		        	<span>Desde:</span>
		        	<span>
		        		<g:if test="${fromDateFilter == null}"><g:set var="fromDateFilter" value="${new Date()-30}"/></g:if>
			        	<g:datePicker name="fromDateFilter" value="${fromDateFilter}" precision="day"/>
		        	</span>
		        </div>		        
	        	<div>
		        	<span>Hasta:</span>
		        	<span>
		        		<g:if test="${toDateFilter == null}"><g:set var="toDateFilter" value="${new Date()+1}"/></g:if>
			        	<g:datePicker name="toDateFilter" value="${toDateFilter}" precision="day"/>
		        	</span>
		        </div>
		        <div><input type="submit" value="Filtrar"/> </div>        	        
	        
        </div>
            
            <div class="list">
                <table>
                    <thead>
                        <tr>
                        
                            <g:sortableColumn property="id" title="${message(code: 'orden.id.label', default: 'Id')}" />
                        
                            <g:sortableColumn property="quantity" title="${message(code: 'orden.quantity.label', default: 'Quantity')}" />
                        
                            <g:sortableColumn property="total_amount" title="${message(code: 'orden.total_amount.label', default: 'Totalamount')}" />
                        
                            <g:sortableColumn property="unit_price" title="${message(code: 'orden.unit_price.label', default: 'Unitprice')}" />
                        
                            <th><g:message code="orden.collectorUser.label" default="Collector User" /></th>
                            
                            <g:sortableColumn property="dateCreated" title="${message(code: 'orden.dateCreated.label', default: 'Date Created')}" />

                            <g:sortableColumn property="status" title="${message(code: 'orden.status.label', default: 'Status')}" />

                            <th>Action</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                    <g:each in="${ordenInstanceList}" status="i" var="ordenInstance">
                        <tr id="fila_${ordenInstance.id}" class="${(i % 2) == 0 ? 'odd' : 'even'}">
                        
                            <td><g:link action="show" id="${ordenInstance.id}">${fieldValue(bean: ordenInstance, field: "id")}</g:link></td>
                        
                            <td>${fieldValue(bean: ordenInstance, field: "quantity")}</td>
                        
                            <td>${fieldValue(bean: ordenInstance, field: "total_amount")}</td>
                        
                            <td>${fieldValue(bean: ordenInstance, field: "unit_price")}</td>

                            <td>${fieldValue(bean: ordenInstance, field: "collectorUser")}</td>
                            
                            <td><g:formatDate format="yyyy-MM-dd" date="${fieldValue(bean: ordenInstance, field: "dateCreated")}"/></td>
                        
                            <td><div id="status_${ordenInstance.id}">${fieldValue(bean: ordenInstance, field: "status")}</div></td>
                        
                            <td><div id="action_${ordenInstance.id}">
	                            <g:if test="${ordenInstance.status == 'Pending'}">
                                        <a href="#" onclick="javascript:changeStatus(${ordenInstance.id});">Deliver</a>
	                            </g:if>
                       		</div>
                            </td>                        
                        </tr>
                    </g:each>
                    </tbody>
                </table>
            </div>
            
            <div class="paginateButtons">
                <g:paginate total="${ordenInstanceTotal}" params="${[statusFilter:statusFilter, tableFilter: tableFilter]}" />
            </div>
</form>
        </div>

        <script type="text/javascript">
        function changeStatus(id) {
            $.ajax({
                    url: "changeStatus",
                    data: "id=" + id,
                    success: function(statusReturned) {
                		$("#status_" + id).html(statusReturned);
                		$("#action_" + id).html("");
                		//alert("${filter}");
                		if ("${statusFilter}" == "Pending")
                		{
                			$("#fila_" + id).remove();
                		}
                    }
                  });
               };
        </script>

    </body>
</html>
