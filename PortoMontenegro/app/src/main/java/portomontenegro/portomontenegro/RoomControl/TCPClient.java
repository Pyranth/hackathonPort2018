package portomontenegro.portomontenegro.RoomControl;

import android.util.Log;
import java.io.*;
import java.net.InetAddress;
import java.net.Socket;
import android.os.AsyncTask;

public class TCPClient  {

    private String serverMessage;
    public static final String SERVERIP = "10.71.7.211"; //your computer IP address
    public static final int SERVERPORT = 80;
    private OnMessageReceived mMessageListener = null;
    private boolean mRun = false;
    static Socket socket;
    static  InetAddress serverAddr;

    PrintWriter out;
    BufferedReader in;
    private class LongOperation extends AsyncTask<String, Void, String> {
        @Override
        protected String doInBackground(String... params) {

            try {
                if (out != null && !out.checkError()) {
                    out.println("zON");
                    out.flush();
                    Log.i("Radi", "Radi");
                }
            }catch (Exception e){

            }
            return null;
        }

        @Override
        protected void onPostExecute(String result) {
        }

        @Override
        protected void onPreExecute() {
        }

        @Override
        protected void onProgressUpdate(Void... values) {
        }
    }
    /**
     *  Constructor of the class. OnMessagedReceived listens for the messages received from server
     */
    public TCPClient(OnMessageReceived listener) {
        mMessageListener = listener;
    }

    /**
     * Sends the message entered by client to the server
     * @param c text entered by client
     */

    public void sendMessage(char c){
        Thread worker;
        if(c == 'b')
        {
            worker = new Thread(new Runnable(){

                private void updateUI()
                {
             /*   if(worker.isInterrupted()){
                    return;
                }
                runOnUiThread(new Runnable(){

                    @Override
                    public void run()
                    {
                        // Update view and remove loading spinner etc...
                    }
                });*/
                }

                private void send()
                {
                    out.print('b');
                    out.flush();

                }

                @Override
                public void run()
                {
                    Log.d("Radi", "Thread run()");
                    send();
                }

            });
            worker.start();
        }else if(c == 'Z') {
            worker = new Thread(new Runnable() {

                private void updateUI() {
             /*   if(worker.isInterrupted()){
                    return;
                }
                runOnUiThread(new Runnable(){

                    @Override
                    public void run()
                    {
                        // Update view and remove loading spinner etc...
                    }
                });*/
                }

                private void send() {
                    out.print('Z');
                    out.flush();

                }

                @Override
                public void run() {
                    Log.d("Radi", "Thread run()");
                    send();
                }

            });
            worker.start();
        }else if(c == 'z'){
            worker = new Thread(new Runnable(){

                private void updateUI()
                {
             /*   if(worker.isInterrupted()){
                    return;
                }
                runOnUiThread(new Runnable(){

                    @Override
                    public void run()
                    {
                        // Update view and remove loading spinner etc...
                    }
                });*/
                }

                private void send()
                {
                    out.print('z');
                    out.flush();

                }

                @Override
                public void run()
                {
                    Log.d("Radi", "Thread run()");
                    send();
                }

            });
            worker.start();
        }else if (c == 'C'){
            worker = new Thread(new Runnable(){

                private void updateUI()
                {
             /*   if(worker.isInterrupted()){
                    return;
                }
                runOnUiThread(new Runnable(){

                    @Override
                    public void run()
                    {
                        // Update view and remove loading spinner etc...
                    }
                });*/
                }

                private void send()
                {
                    out.print('C');
                    out.flush();

                }

                @Override
                public void run()
                {
                    Log.d("Radi", "Thread run()");
                    send();
                }

            });
            worker.start();
        }else if(c == 'c'){
            worker = new Thread(new Runnable(){

                private void updateUI()
                {
             /*   if(worker.isInterrupted()){
                    return;
                }
                runOnUiThread(new Runnable(){

                    @Override
                    public void run()
                    {
                        // Update view and remove loading spinner etc...
                    }
                });*/
                }

                private void send()
                {
                    out.print('c');
                    out.flush();

                }

                @Override
                public void run()
                {
                    Log.d("Radi", "Thread run()");
                    send();
                }

            });
            worker.start();
        }

    }

    public void stopClient(){
        mRun = false;
    }

    public void run() {

        mRun = true;

        try {
            //here you must put your computer's IP address.
             serverAddr = InetAddress.getByName(SERVERIP);

            Log.e("TCP Client", "C: Connecting...");

            //create a socket to make the connection with the server
             socket = new Socket(serverAddr, SERVERPORT);
            try {

                //send the message to the server
                out = new PrintWriter(new BufferedWriter(new OutputStreamWriter(socket.getOutputStream())), true);

                Log.e("TCP Client", "C: Sent.");

                Log.e("TCP Client", "C: Done.");

                //receive the message which the server sends back
                in = new BufferedReader(new InputStreamReader(socket.getInputStream()));

                //in this while the client listens for the messages sent by the server
                while (mRun) {
                    serverMessage = in.readLine();

                    if (serverMessage != null && mMessageListener != null) {
                        //call the method messageReceived from MyActivity class
                        mMessageListener.messageReceived(serverMessage);
                    }
                    serverMessage = null;

                }

                Log.e("RESPONSE FROM SERVER", "S: Received Message: '" + serverMessage + "'");

            } catch (Exception e) {

                Log.e("TCP", "S: Error", e);

            } finally {
                //the socket must be closed. It is not possible to reconnect to this socket
                // after it is closed, which means a new socket instance has to be created.
                socket.close();
            }

        } catch (Exception e) {

            Log.e("TCP", "C: Error", e);

        }

    }

    //Declare the interface. The method messageReceived(String message) will must be implemented in the MyActivity
    //class at on asynckTask doInBackground
    public interface OnMessageReceived {
        public void messageReceived(String message);
    }


}