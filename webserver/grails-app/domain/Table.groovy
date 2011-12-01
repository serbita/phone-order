

class Table {
        static belongsTo = [user : User]
        String name
        String description

        Date dateCreated
        Date lastUpdated

        static constraints = {
             description(nullable:true)
        }
}
