

class User {
        
        String nickname
        String password
        String homepage
        String name
        String surname
        String email
        String phone

        static hasMany = [ tables : Table, items : Item, ordens : Orden]

        Date dateCreated
        Date lastUpdated
        
        static constraints = {
                nickname(size:3..30, unique: true)
                password(size: 6..15)
                surname(nullable: true, maxSize:200)
                email(nullable:true, email:true, maxSize:200)
                phone(nullable:true, maxSize:50)
                homepage(url: true, nullable: true, maxSize:500)
        }
}
