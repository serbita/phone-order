

class Table {
        static belongsTo = [user : User]

        static hasMany = [ordens : Orden]
        
        String name
        String description

        Date dateCreated
        Date lastUpdated

        static constraints = {
             description(nullable:true)
        }
}
