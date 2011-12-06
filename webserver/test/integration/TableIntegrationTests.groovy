

import grails.test.*

class TableIntegrationTests extends GrailsUnitTestCase {

     void testFirstTable() {
                def user = new User(nickname: 'joe-5', name:'Pepe', password: 'secret', homepage: 'http://www.grailsinaction.com')
                assertNotNull user.save()
                def table1 = new Table(name: "mesa 1")
                user.addToTables(table1)
                assertEquals 1, User.get(user.id).tables.size()
        }
}
