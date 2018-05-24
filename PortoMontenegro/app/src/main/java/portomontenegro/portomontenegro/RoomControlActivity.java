package portomontenegro.portomontenegro;

import android.os.AsyncTask;
import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.CompoundButton;
import android.widget.Switch;

import portomontenegro.portomontenegro.RoomControl.TCPClient;

/**
 * Created by user on 24.5.2018..
 */

public class RoomControlActivity extends AppCompatActivity
{
    private TCPClient mTcpClient;

    @Override
    public void onCreate(@Nullable Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.lista_layout);

        final Switch svicZeleni = (Switch) findViewById(R.id.switchZelena);
        final Switch svicCrveni = (Switch) findViewById(R.id.switchCrvena);
        Button test = (Button) findViewById(R.id.btnUnlock);

//        mAdapter = new MyCustomAdapter(getContext(), arrayList);
//        mList.setAdapter(mAdapter);

        // connect to the server
        new connectTask().execute("");


        test.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (mTcpClient != null) {
                    mTcpClient.sendMessage('b');
                    svicZeleni.setChecked(true);

                }

                //refresh the list
//                mAdapter.notifyDataSetChanged();
                Log.i("Radi", "onClick: jdiaojdiasjda");
            }
        });

        svicZeleni.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
            public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                if(svicZeleni.isChecked()){
                    mTcpClient.sendMessage('Z');
                    Log.i("Radi", "onClick: jdiaojdiasjda");
                }
                else{
                    mTcpClient.sendMessage('z');
                    Log.i("Radi", "onClick: jdiaojdiasjda");
                }
            }
        });
        svicCrveni.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
            public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                if(svicCrveni.isChecked()){
                    mTcpClient.sendMessage('C');
                }
                else{
                    mTcpClient.sendMessage('c');

                }
            }
        });
    }



    public class connectTask extends AsyncTask<String,String,TCPClient>
    {
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
//            arrayList.add(values[0]);
//            // notify the adapter that the data set has changed. This means that new message received
//            // from server was added to the list
//            mAdapter.notifyDataSetChanged();
        }
    }
}
