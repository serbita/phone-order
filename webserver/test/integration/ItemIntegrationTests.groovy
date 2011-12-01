

import grails.test.*

class ItemIntegrationTests extends GroovyTestCase {
         void testFirstItem() {
                def user = new User(nickname: 'joe-6', name:'Pepe', password: 'secret', homepage: 'http://www.grailsinaction.com')
                assertNotNull user.save()
                def item1 = new Item(title: "Fernet Branca vaso")
                user.addToItems(item1)
                assertEquals 1, User.get(user.id).items.size()
        }
}
