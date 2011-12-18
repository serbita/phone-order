

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Lista de Items</title>
    </head>
    <body>
        <div>
            <div>
                <table>
                    <thead>
                        <tr>
                        
                            <g:sortableColumn property="id" title="${message(code: 'item.id.label', default: 'Id')}" />
                            
                            <th></th>
                        
                            <g:sortableColumn property="title" title="${message(code: 'item.title.label', default: 'Title')}" />                            
                        
                        </tr>
                    </thead>
                    <tbody>
                    <g:each in="${itemInstanceList}" status="i" var="itemInstance">
                        <tr class="${(i % 2) == 0 ? 'odd' : 'even'}">
                        
                            <td><g:link action="show" controller="mobile" params="[table: tableInstance?.id, item: itemInstance?.id]">${fieldValue(bean: itemInstance, field: "id")}</g:link></td>
                                                        
                            <td><img src="${resource(dir:'images/qrcodes/user_' + tableInstance?.user?.id + '/table_' + tableInstance?.id,file:'item_' + itemInstance?.id + '.png')}" border="0" height="100px" /></td>                            
                        
                            <td>${fieldValue(bean: itemInstance, field: "title")}</td>
                        
                        </tr>
                    </g:each>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
