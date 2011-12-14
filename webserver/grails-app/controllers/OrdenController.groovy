class OrdenController {
	
	static allowedMethods = [save: "POST", update: "POST", delete: "POST"]
	
	def index = {
		redirect(action: "list", params: params)
	}
	
	def list = {
		//Descomentar cuando se utilice paginado
		//params.max = Math.min(params.max ? params.int('max') : 10, 100)
		
		def statusFilter = params.statusFilter
		def Calendar fromDateFilter = params.fromDateFilter
		def Calendar toDateFilter = params.toDateFilter
		def long tableFilter = params.toDateFilter
		tableFilter = 1
		
		fromDateFilter = Calendar.getInstance();
		fromDateFilter.set(Calendar.HOUR, 0)
		fromDateFilter.set(Calendar.MINUTE, 0)
		fromDateFilter.set(Calendar.SECOND, 0)
		
		toDateFilter = Calendar.getInstance();
		toDateFilter.set(Calendar.HOUR, 0)
		toDateFilter.set(Calendar.MINUTE, 0)
		toDateFilter.set(Calendar.SECOND, 0)
		
		def c = Orden.createCriteria()
		def results = c.list {
			if (statusFilter != null) eq("status", statusFilter)	
			if (fromDateFilter != null) ge("dateCreated", fromDateFilter.getTime())
			if (toDateFilter != null) le("dateCreated", toDateFilter.getTime()-100)
			if (tableFilter != null) eq("table.id", tableFilter)
		}
//			eq("status", "Pending")
//			or {
//				like("holderFirstName", "Fred%")
//				like("holderFirstName", "Barney%")
//			}
//			maxResults(10)
//			order("holderLastName", "desc")
		
		println c
		println results

		
		if (statusFilter == null)
			statusFilter = "All"
		
		def ordenList
		if (statusFilter.equals("Pending") || statusFilter.equals("Delivered"))
			ordenList = Orden.findAllByStatus(statusFilter)
		else 
			ordenList = Orden.list(params)
		
		[ordenInstanceList: ordenList, ordenInstanceTotal: ordenList.count(), statusFilter: statusFilter]
		
		
/*
 * 
 * 		def statusFilter = params.statusFilter
		def fromDateFilter = params.fromDateFilter
		def toDateFilter = params.toDateFilter
		
		Orden.findAllWhere()
		
		if (statusFilter == null)
			statusFilter = "All"
		
		def ordenList
		if (statusFilter.equals("Pending") || statusFilter.equals("Delivered"))
			ordenList = Orden.findAllByStatus(statusFilter)
		else 
			ordenList = Orden.list(params)
 * 		
 */
	}
	
	def create = {
		def ordenInstance = new Orden()
		ordenInstance.properties = params
		return [ordenInstance: ordenInstance]
	}
	
	def save = {
		def ordenInstance = new Orden(params)
		if (ordenInstance.save(flush: true)) {
			flash.message = "${message(code: 'default.created.message', args: [message(code: 'orden.label', default: 'Orden'), ordenInstance.id])}"
			redirect(action: "show", id: ordenInstance.id)
		}
		else {
			render(view: "create", model: [ordenInstance: ordenInstance])
		}
	}
	
	def show = {
		def ordenInstance = Orden.get(params.id)
		if (!ordenInstance) {
			flash.message = "${message(code: 'default.not.found.message', args: [message(code: 'orden.label', default: 'Orden'), params.id])}"
			redirect(action: "list")
		}
		else {
			[ordenInstance: ordenInstance]
		}
	}
	
	def edit = {
		def ordenInstance = Orden.get(params.id)
		if (!ordenInstance) {
			flash.message = "${message(code: 'default.not.found.message', args: [message(code: 'orden.label', default: 'Orden'), params.id])}"
			redirect(action: "list")
		}
		else {
			return [ordenInstance: ordenInstance]
		}
	}
	
	def update = {
		def ordenInstance = Orden.get(params.id)
		if (ordenInstance) {
			if (params.version) {
				def version = params.version.toLong()
				if (ordenInstance.version > version) {
					
					ordenInstance.errors.rejectValue("version", "default.optimistic.locking.failure", [message(code: 'orden.label', default: 'Orden')] as Object[], "Another user has updated this Orden while you were editing")
					render(view: "edit", model: [ordenInstance: ordenInstance])
					return
				}
			}
			ordenInstance.properties = params
			if (!ordenInstance.hasErrors() && ordenInstance.save(flush: true)) {
				flash.message = "${message(code: 'default.updated.message', args: [message(code: 'orden.label', default: 'Orden'), ordenInstance.id])}"
				redirect(action: "show", id: ordenInstance.id)
			}
			else {
				render(view: "edit", model: [ordenInstance: ordenInstance])
			}
		}
		else {
			flash.message = "${message(code: 'default.not.found.message', args: [message(code: 'orden.label', default: 'Orden'), params.id])}"
			redirect(action: "list")
		}
	}
	
	def delete = {
		def ordenInstance = Orden.get(params.id)
		if (ordenInstance) {
			try {
				ordenInstance.delete(flush: true)
				flash.message = "${message(code: 'default.deleted.message', args: [message(code: 'orden.label', default: 'Orden'), params.id])}"
				redirect(action: "list")
			}
			catch (org.springframework.dao.DataIntegrityViolationException e) {
				flash.message = "${message(code: 'default.not.deleted.message', args: [message(code: 'orden.label', default: 'Orden'), params.id])}"
				redirect(action: "show", id: params.id)
			}
		}
		else {
			flash.message = "${message(code: 'default.not.found.message', args: [message(code: 'orden.label', default: 'Orden'), params.id])}"
			redirect(action: "list")
		}
	}
	
	def changeStatus = {
		//TODO: Pendiente que al cambiar el estado de una orden, queda el filtro de la busqueda desactualizado
		def orden = Orden.findById(params.id)
		orden.setStatus("Delivered")
		if (!orden.hasErrors() && orden.save(flush: true)) {
			render orden.status;
		}
	}
}
