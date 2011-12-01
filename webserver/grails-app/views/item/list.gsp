<html>
    <head>
        <title>Title</title>
    </head>
    <body>
    <table>     	 
    	<g:each in="${itemList}" status="i" var="item">
  			<tr class="${(i % 2) == 0 ? 'even' : 'odd'}">
			    <td><g:link action="show" id="${item.id}">${item.id?.encodeAsHTML()}</g:link></td>			 
			    <td>${item.title?.encodeAsHTML()}</td>
  			</tr>
		</g:each>
	</table>	
    </body>
</html>
