
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <g:set var="entityName" value="${message(code: 'item.label', default: 'Item')}" />
        <title>Pedidos</title>
    </head>
    <body>
        <div>
            <h1>Muro Bar</h1>
            <g:form action="save" >
            <g:hiddenField name="itemId" value="${itemInstance?.id}" />
            <g:hiddenField name="tableId" value="${tableInstance?.id}" />
            <div class="dialog">            
                <table>
                    <tbody>
                    
                        <tr class="prop">
                            <td valign="top" class="name">Item</td>
                            
                            <td valign="top" class="value">${fieldValue(bean: itemInstance, field: "title")}&nbsp;(${fieldValue(bean: itemInstance, field: "id")})</td>
                            
                        </tr>

                        <tr class="prop">
                            <td valign="top" class="name">Table</td>
                            
                            <td valign="top" class="value">${fieldValue(bean: tableInstance, field: "name")}&nbsp;(${fieldValue(bean: tableInstance, field: "id")})</td>
                            
                        </tr>
                        
                        <tr class="prop">
                            <td valign="top" class="name">Price</td>
                            
                            <td valign="top" class="value">${fieldValue(bean: itemInstance, field: "price")}</td>
                            
                        </tr>                        
                        
                        <tr class="prop">
                            <td valign="top" class="name">Quantity</td>
                            
                            <td valign="top" class="value"><g:textField name="quantity" value="" /></td>
                            
                        </tr>                        
                    
                    </tbody>
                </table>
            </div>
            <div>    
                    <span class="button"><g:submitButton name="order" value="Order" /></span>
            </div>
            </g:form>
        </div>
    </body>
</html>
