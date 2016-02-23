package com.francescosalvatore.coap;

public interface CoapAgent {
	
	/**
	 * Register an OBSERVABLE action on ResourceURI specified.
	 * @param actionName is the name of the action.
	 * @param connectionId is the identifier of connection in database.
	 * @param resourceURI is the URI that point to the observable resource.
	 * @return TRUE if action has been correctly created, FALSE otherwise.
	 */
	public boolean addAction(String actionName, int connectionId, String resourceURI);
	
	/**
	 * Register a PERIODIC action on ResourceURI specified.
	 * @param actionName is the name of the action.
	 * @param connectionId is the identifier of connection in database.
	 * @param resourceURI is the URI that point to the observable resource.
	 * @param period is the periodic time (in seconds). At each period the Agent send a GET request to the resource
	 * and perform the action request by connector.
	 * @return TRUE if action has been correctly created, FALSE otherwise.
	 */
	public boolean addAction(String actionName, int connectionId, String resourceURI, int period);
	
	/**
	 * @param actionId is the action identifier in database.
	 * @return TRUE if the action is unregistered, FALSE if an error has occurred.
	 */
	public boolean unregisterAction(int actionId);
	
	/**
	 * @return the number of running threads on this Agent. 
	 */
	public int getLoad();

}
