package com.francescosalvatore;

import java.net.Inet6Address;
import java.net.InetAddress;
import java.net.InetSocketAddress;

import org.eclipse.californium.core.CoapServer;
import org.eclipse.californium.core.network.CoapEndpoint;
import org.eclipse.californium.core.network.EndpointManager;
import org.eclipse.californium.core.network.config.NetworkConfig;

public class CoapTestServer extends CoapServer {
	//Inizializzo la porta standard 5683
	private static final int COAP_PORT = NetworkConfig.getStandard().getInt(NetworkConfig.Keys.COAP_PORT);
	
	public static void main(String[] args)
	{
		CoapTestServer server = new CoapTestServer();
		server.addEndpoints();
		server.start();
	}
	
	public CoapTestServer()
	{
		add(new CoapTestResource("temperature"));
	}
	
	private void addEndpoints() 
	{
    	for (InetAddress addr : EndpointManager.getEndpointManager().getNetworkInterfaces()) {
    		// only binds to IPv6 addresses and localhost
			if (addr instanceof Inet6Address || addr.isLoopbackAddress()) {
				InetSocketAddress bindToAddress = new InetSocketAddress(addr, COAP_PORT);
				addEndpoint(new CoapEndpoint(bindToAddress));
			}
		}
    }
}
