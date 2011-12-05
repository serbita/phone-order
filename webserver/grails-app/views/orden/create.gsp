


<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="layout" content="main" />
        <g:set var="entityName" value="${message(code: 'orden.label', default: 'Orden')}" />
        <title><g:message code="default.create.label" args="[entityName]" /></title>
    </head>
    <body>
        <div class="nav">
            <span class="menuButton"><a class="home" href="${createLink(uri: '/')}"><g:message code="default.home.label"/></a></span>
            <span class="menuButton"><g:link class="list" action="list"><g:message code="default.list.label" args="[entityName]" /></g:link></span>
        </div>
        <div class="body">
            <h1><g:message code="default.create.label" args="[entityName]" /></h1>
            <g:if test="${flash.message}">
            <div class="message">${flash.message}</div>
            </g:if>
            <g:hasErrors bean="${ordenInstance}">
            <div class="errors">
                <g:renderErrors bean="${ordenInstance}" as="list" />
            </div>
            </g:hasErrors>
            <g:form action="save" >
                <div class="dialog">
                    <table>
                        <tbody>
                        
                            <tr class="prop">
                                <td valign="top" class="name">
                                    <label for="quantity"><g:message code="orden.quantity.label" default="Quantity" /></label>
                                </td>
                                <td valign="top" class="value ${hasErrors(bean: ordenInstance, field: 'quantity', 'errors')}">
                                    <g:textField name="quantity" value="${fieldValue(bean: ordenInstance, field: 'quantity')}" />
                                </td>
                            </tr>
                        
                            <tr class="prop">
                                <td valign="top" class="name">
                                    <label for="total_amount"><g:message code="orden.total_amount.label" default="Totalamount" /></label>
                                </td>
                                <td valign="top" class="value ${hasErrors(bean: ordenInstance, field: 'total_amount', 'errors')}">
                                    <g:textField name="total_amount" value="${fieldValue(bean: ordenInstance, field: 'total_amount')}" />
                                </td>
                            </tr>
                        
                            <tr class="prop">
                                <td valign="top" class="name">
                                    <label for="unit_price"><g:message code="orden.unit_price.label" default="Unitprice" /></label>
                                </td>
                                <td valign="top" class="value ${hasErrors(bean: ordenInstance, field: 'unit_price', 'errors')}">
                                    <g:textField name="unit_price" value="${fieldValue(bean: ordenInstance, field: 'unit_price')}" />
                                </td>
                            </tr>
                        
                            <tr class="prop">
                                <td valign="top" class="name">
                                    <label for="status"><g:message code="orden.status.label" default="Status" /></label>
                                </td>
                                <td valign="top" class="value ${hasErrors(bean: ordenInstance, field: 'status', 'errors')}">
                                    <g:select name="status" from="${ordenInstance.constraints.status.inList}" value="${ordenInstance?.status}" valueMessagePrefix="orden.status"  />
                                </td>
                            </tr>
                        
                            <tr class="prop">
                                <td valign="top" class="name">
                                    <label for="collectorUser"><g:message code="orden.collectorUser.label" default="Collector User" /></label>
                                </td>
                                <td valign="top" class="value ${hasErrors(bean: ordenInstance, field: 'collectorUser', 'errors')}">
                                    <g:select name="collectorUser.id" from="${User.list()}" optionKey="id" value="${ordenInstance?.collectorUser?.id}"  />
                                </td>
                            </tr>
                        
                            <tr class="prop">
                                <td valign="top" class="name">
                                    <label for="item"><g:message code="orden.item.label" default="Item" /></label>
                                </td>
                                <td valign="top" class="value ${hasErrors(bean: ordenInstance, field: 'item', 'errors')}">
                                    <g:select name="item.id" from="${Item.list()}" optionKey="id" value="${ordenInstance?.item?.id}"  />
                                </td>
                            </tr>
                        
                        </tbody>
                    </table>
                </div>
                <div class="buttons">
                    <span class="button"><g:submitButton name="create" class="save" value="${message(code: 'default.button.create.label', default: 'Create')}" /></span>
                </div>
            </g:form>
        </div>
    </body>
</html>
