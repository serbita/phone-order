

import grails.test.*

//class UserIntegrationTests extends GroovyTestCase {
class UserIntegrationTests extends GrailsUnitTestCase {
 /*   protected void setUp() {
        super.setUp()
    }

    protected void tearDown() {
        super.tearDown()
    }

*/
    void testFirstSaveEver() {
        def user = new User(nickname: 'joe', name:'Pepe', password: 'secret',
        homepage: 'http://www.grailsinaction.com')
        assertNotNull user.save()
        assertNotNull user.id
        def foundUser = User.get(user.id)
        assertEquals 'joe', foundUser.nickname
    }

        void testSaveAndUpdate() {
                def user = new User(nickname: 'joe-2', name:'Pepe', password: 'secret',
                homepage: 'http://www.grailsinaction.com')
                assertNotNull user.save()
                def foundUser = User.get(user.id)
                foundUser.password = 'sesame'
                foundUser.save()
                def editedUser = User.get(user.id)
                assertEquals 'sesame', editedUser.password
        }
        void testSaveThenDelete() {
                def user = new User(nickname: 'joe-3', name:'Pepe', password: 'secret',
                homepage: 'http://www.grailsinaction.com')
                assertNotNull user.save()
                def foundUser = User.get(user.id)
                foundUser.delete()
                assertFalse User.exists(foundUser.id)
        }

        void testEvilSave() {
                def user = new User(nickname: 'chuck_norris',  name:'Pepe',   
                password: 'tiny', homepage: 'not-a-url')
                assertFalse user.validate()
                assertTrue user.hasErrors()
                def errors = user.errors
                assertEquals "size.toosmall", errors.getFieldError("password").code
                assertEquals "tiny", errors.getFieldError("password").rejectedValue
                assertEquals "url.invalid", errors.getFieldError("homepage").code
                assertEquals "not-a-url", errors.getFieldError("homepage").rejectedValue
                assertNull errors.getFieldError("nickname")
        }

        void testEvilSaveCorrected() {
                def user = new User(nickname: 'chuck_norris-2', name:'Pepe',
                password: 'tiny', homepage: 'not-a-url')
                assertFalse(user.validate())
                assertTrue(user.hasErrors())
                assertNull user.save()
                user.password = "fistfist"
                user.homepage = "http://www.chucknorrisfacts.com"
                assertTrue(user.validate())
                assertFalse(user.hasErrors())
                assertNotNull user.save()
        }


}
