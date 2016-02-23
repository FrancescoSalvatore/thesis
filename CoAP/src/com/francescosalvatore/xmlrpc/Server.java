package com.francescosalvatore.xmlrpc;

import org.apache.xmlrpc.server.PropertyHandlerMapping;
import org.apache.xmlrpc.server.XmlRpcServer;
import org.apache.xmlrpc.webserver.WebServer;

public class Server {
	
	private static int port = 8008;
	
	public static void main(String args[])
	{
		try
		{
			WebServer server = new WebServer(port);
			XmlRpcServer xmlrpcserver = server.getXmlRpcServer();
			PropertyHandlerMapping phm = new PropertyHandlerMapping();
			phm.addHandler("coap", com.francescosalvatore.coap.CoapHandler.class);
			xmlrpcserver.setHandlerMapping(phm);
			server.start();
			System.out.println("CoAP Cloud Server running on port "+port+"...");
		}
		catch(Exception e)
		{
			System.out.println(e.getMessage());
		}
	}

}
