

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="layout" content="main" />
        <g:set var="entityName" value="${message(code: 'orden.label', default: 'Orden')}" />
        <title><g:message code="default.list.label" args="[entityName]" /></title>
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
            <div class="list">
                <table>
                    <thead>
                        <tr>
                        
                            <g:sortableColumn property="id" title="${message(code: 'orden.id.label', default: 'Id')}" />
                        
                            <g:sortableColumn property="quantity" title="${message(code: 'orden.quantity.label', default: 'Quantity')}" />
                        
                            <g:sortableColumn property="total_amount" title="${message(code: 'orden.total_amount.label', default: 'Totalamount')}" />
                        
                            <g:sortableColumn property="unit_price" title="${message(code: 'orden.unit_price.label', default: 'Unitprice')}" />
                        
                            <g:sortableColumn property="status" title="${message(code: 'orden.status.label', default: 'Status')}" />
                        
                            <th><g:message code="orden.collectorUser.label" default="Collector User" /></th>
                        
                        </tr>
                    </thead>
                    <tbody>
                    <g:each in="${ordenInstanceList}" status="i" var="ordenInstance">
                        <tr class="${(i % 2) == 0 ? 'odd' : 'even'}">
                        
                            <td><g:link action="show" id="${ordenInstance.id}">${fieldValue(bean: ordenInstance, field: "id")}</g:link></td>
                        
                            <td>${fieldValue(bean: ordenInstance, field: "quantity")}</td>
                        
                            <td>${fieldValue(bean: ordenInstance, field: "total_amount")}</td>
                        
                            <td>${fieldValue(bean: ordenInstance, field: "unit_price")}</td>
                        
                            <td>${fieldValue(bean: ordenInstance, field: "status")}</td>
                        
                            <td>${fieldValue(bean: ordenInstance, field: "collectorUser")}</td>
                        
                        </tr>
                    </g:each>
                    </tbody>
                </table>
            </div>
            <div class="paginateButtons">
                <g:paginate total="${ordenInstanceTotal}" />
            </div>
        </div>
    </body>
</html>
