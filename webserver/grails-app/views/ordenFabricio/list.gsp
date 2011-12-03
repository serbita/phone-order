

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="layout" content="main" />
        <g:set var="entityName" value="${message(code: 'orden.label', default: 'Orden')}" />
        <title><g:message code="default.list.label" args="[entityName]" /></title>
        <g:javascript library="jquery" plugin="jquery"/>
        <jqui:resources theme="darkness" />
        
        <script type="text/javascript">
        
        function changeStatus(id) {
            $.ajax({
                    url: "changeStatus",
                    data: "id=" + id,
                    success: function(statusReturned) {
                		$("#status_" + id).html(statusReturned);
                		$("#action_" + id).html("");
                    }
                  });
               };
        </script>
        
    </head>
    <body>
        <div class="body">
            <h1><g:message code="default.list.label" args="[entityName]" /></h1>
            <g:if test="${flash.message}">
            <div class="message">${flash.message}</div>
            </g:if>
            <div class="list">
                <table>
                    <thead>
                        <tr>
                        
                            <g:sortableColumn property="id" title="${message(code: 'orden.id.label', default: 'Id')}" />
                        
                            <g:sortableColumn property="quantity" title="${message(code: 'orden.quantity.label', default: 'Quantity')}" />
                        
                            <g:sortableColumn property="total_amount" title="${message(code: 'orden.total_amount.label', default: 'Totalamount')}" />
                        
                            <g:sortableColumn property="unit_price" title="${message(code: 'orden.unit_price.label', default: 'Unitprice')}" />
                        
                            <th><g:message code="orden.collectorUser.label" default="Collector User" /></th>
                            
                            <th><g:message code="status" default="Status" /></th>
                            
                            <th>Action</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                    <g:each in="${ordenInstanceList}" status="i" var="ordenInstance">
                        <tr class="${(i % 2) == 0 ? 'odd' : 'even'}">
                        
                            <td><g:link action="show" id="${ordenInstance.id}">${fieldValue(bean: ordenInstance, field: "id")}</g:link></td>
                        
                            <td>${fieldValue(bean: ordenInstance, field: "quantity")}</td>
                        
                            <td>${fieldValue(bean: ordenInstance, field: "total_amount")}</td>
                        
                            <td>${fieldValue(bean: ordenInstance, field: "unit_price")}</td>
                        
                            <td>${fieldValue(bean: ordenInstance, field: "collectorUser")}</td>
                            
                            <td><div id="status_${ordenInstance.id}">${fieldValue(bean: ordenInstance, field: "status")}</div></td>
                           
                            <td>
                            	<div id="action_${ordenInstance.id}">
		                            <g:if test="${ordenInstance.status == 'Pending'}">
		                            	<a href="#" onclick="javascript:changeStatus(${ordenInstance.id});">Deliver</a></td>
		                        	</g:if>
                        		</div>
                        	</td>
                        </tr>
                    </g:each>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
