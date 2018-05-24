package portomontenegro.portomontenegro;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;

/**
 * Created by user on 23.5.2018..
 */

public class TypeOfUserActivity extends AppCompatActivity
{
    Button guestBTN, visitorBTN;
    public static final String MY_PREFS_NAME = "MyPrefsFile";
    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.choose_user_layout);

        guestBTN = findViewById(R.id.guestID);
        visitorBTN = findViewById(R.id.visitorID);
    }

    @Override
    protected void onStart()
    {
        super.onStart();

        guestBTN.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View view)
            {
                SharedPreferences pref = getApplicationContext().getSharedPreferences("MyPref", MODE_PRIVATE);
                SharedPreferences.Editor editor = pref.edit();
                editor.putBoolean("key_name1", true);
                editor.commit();

                Intent intent = new Intent(getApplicationContext(), QRScannerActivity.class);
                startActivity(intent);
            }
        });

        visitorBTN.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View view)
            {
                SharedPreferences pref = getApplicationContext().getSharedPreferences("MyPref", MODE_PRIVATE);
                SharedPreferences.Editor editor = pref.edit();
                editor.putBoolean("key_name1", false);
                editor.commit();
                Intent intent = new Intent(getApplicationContext(), QRScannerActivity.class);
                startActivity(new Intent(getApplicationContext(), MainActivity.class).putExtra("TYPEOFUSER",false));
            }
        });
    }
}
