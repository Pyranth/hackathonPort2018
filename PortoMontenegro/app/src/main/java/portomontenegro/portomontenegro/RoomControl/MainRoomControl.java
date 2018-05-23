package portomontenegro.portomontenegro.RoomControl;

import android.app.Activity;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ListView;

import java.util.ArrayList;

import portomontenegro.portomontenegro.R;

public class MainRoomControl extends Activity
{
    private ListView mList;
    private ArrayList<String> arrayList;
    private MyCustomAdapter mAdapter;
    private TCPClient mTcpClient;

    @Override
    public void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.room_control_layout);

        arrayList = new ArrayList<String>();

        // final EditText editText = (EditText) findViewById(R.id.editText);
        Button send = (Button)findViewById(R.id.send_button);
        Button Con = (Button)findViewById(R.id.btnCon);
        Button Coff = (Button)findViewById(R.id.btnCoff);
        Button Zon = (Button)findViewById(R.id.btnZon);
        Button Zoff = (Button)findViewById(R.id.btnZoff);

        //relate the listView from java to the one created in xml
        // mList = (ListView)findViewById(R.id.list);
        mAdapter = new MyCustomAdapter(this, arrayList);
//        mList.setAdapter(mAdapter);

        // connect to the server
        new connectTask().execute("");

        send.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                //sends the message to the server
                if (mTcpClient != null) {
                    mTcpClient.sendMessage('b');
                }

                //refresh the list
                mAdapter.notifyDataSetChanged();
                // editText.setText("");
            }
        });
        Con.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                //sends the message to the server
                if (mTcpClient != null) {
                    mTcpClient.sendMessage('C');
                }

                //refresh the list
                mAdapter.notifyDataSetChanged();
                //editText.setText("");
            }
        });
        Coff.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                //sends the message to the server
                if (mTcpClient != null) {
                    mTcpClient.sendMessage('c');
                }

                //refresh the list
                mAdapter.notifyDataSetChanged();
                // editText.setText("");
            }
        });
        Zon.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                //sends the message to the server
                if (mTcpClient != null) {
                    mTcpClient.sendMessage('Z');
                }

                //refresh the list
                mAdapter.notifyDataSetChanged();
                // editText.setText("");
            }
        });
        Zoff.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                //sends the message to the server
                if (mTcpClient != null) {
                    mTcpClient.sendMessage('z');
                }

                //refresh the list
                mAdapter.notifyDataSetChanged();
                // editText.setText("");
            }
        });
    }

    public class connectTask extends AsyncTask<String,String,TCPClient> {

        @Override
        protected TCPClient doInBackground(String... message) {

            //we create a TCPClient object and
            mTcpClient = new TCPClient(new TCPClient.OnMessageReceived() {
                @Override
                //here the messageReceived method is implemented
                public void messageReceived(String message) {
                    //this method calls the onProgressUpdate
                    publishProgress(message);
                }
            });
            mTcpClient.run();

            return null;
        }

        @Override
        protected void onProgressUpdate(String... values) {
            super.onProgressUpdate(values);

            //in the arrayList we add the messaged received from server
            arrayList.add(values[0]);
            // notify the adapter that the data set has changed. This means that new message received
            // from server was added to the list
            mAdapter.notifyDataSetChanged();
        }
    }
}