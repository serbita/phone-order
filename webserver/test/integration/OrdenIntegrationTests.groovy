

import grails.test.*

class OrdenIntegrationTests extends GroovyTestCase {
         void testFirstOrden() {
                def collectorUser = new User(nickname: 'collectorUser', name:'Pepe', password: 'secret', homepage: 'http://www.grailsinaction.com')
                assertNotNull collectorUser.save()
                def payerUser = new User(nickname: 'payerUser', name:'Pepe', password: 'secret', homepage: 'http://www.grailsinaction.com')
                assertNotNull payerUser.save()

                def item1 = new Item(title: "Fernet Branca vaso")
                assertNotNull item1.save()

                def orden1 = new Orden(unit_price:2.1, quantity:2, total_amount:4.2)

                collectorUser.addToOrdens(orden1)
                item1.addToOrdens(orden1)
               
                assertEquals 1, User.get(collectorUser.id).ordens.size()
                assertEquals 1, Item.get(item1.id).ordens.size()
        }

         

}
