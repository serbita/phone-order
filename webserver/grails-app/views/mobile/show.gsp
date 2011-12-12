
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Pedidos</title>
    </head>
    <body>
        <div>
            <h1>Muro Bar</h1>
            
            <g:if test="${error}">
            	<p>${error}</p>
            	<g:eachError><p>${it.defaultMessage}</p></g:eachError>
            </g:if>
                        
            <g:form action="save" >
            <g:hiddenField name="itemId" value="${itemInstance?.id}" />
            <g:hiddenField name="tableId" value="${tableInstance?.id}" />
            <div class="dialog">            
                <table>
                    <tbody>
                    
                        <tr class="prop">
                            <td>Item</td>
                            
                            <td>${fieldValue(bean: itemInstance, field: "title")}&nbsp;(${fieldValue(bean: itemInstance, field: "id")})</td>
                            
                        </tr>

                        <tr class="prop">
                            <td>Table</td>
                            
                            <td>${fieldValue(bean: tableInstance, field: "name")}&nbsp;(${fieldValue(bean: tableInstance, field: "id")})</td>
                            
                        </tr>
                        
                        <tr class="prop">
                            <td>Price</td>
                            
                            <td>${fieldValue(bean: itemInstance, field: "price")}</td>
                            
                        </tr>                        
                        
                        <tr class="prop">
                            <td>Quantity</td>
                            
                            <td><g:textField name="quantity" value="1" /></td>
                            
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
