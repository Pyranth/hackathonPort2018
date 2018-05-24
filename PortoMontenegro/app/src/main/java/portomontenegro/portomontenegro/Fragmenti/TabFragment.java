package portomontenegro.portomontenegro.Fragmenti;

/**
 * Created by user on 23.5.2018..
 */

import android.content.SharedPreferences;
import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.design.widget.TabLayout;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentPagerAdapter;
import android.support.v4.view.ViewPager;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import portomontenegro.portomontenegro.R;

import static android.content.Context.MODE_PRIVATE;
import static portomontenegro.portomontenegro.TypeOfUserActivity.MY_PREFS_NAME;


public class TabFragment extends Fragment {

    public static TabLayout tabLayout;
    public static ViewPager viewPager;
    public static int int_items = 1 ;
   // public static final String MY_PREFS_NAME = "MyPrefsFile";

    @Nullable
    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {


        View x =  inflater.inflate(R.layout.tab_layout, null);
        tabLayout = (TabLayout) x.findViewById(R.id.tabs);
        viewPager = (ViewPager) x.findViewById(R.id.viewpager);


        viewPager.setAdapter(new MyAdapter(getChildFragmentManager()));



        tabLayout.post(new Runnable() {
            @Override
            public void run() {
                tabLayout.setupWithViewPager(viewPager);
            }
        });

        return x;

    }

    class MyAdapter extends FragmentPagerAdapter{

        public MyAdapter(FragmentManager fm) {
            super(fm);
        }


        @Override
        public Fragment getItem(int position)
        {

            SharedPreferences pref = getContext().getSharedPreferences("MyPref", MODE_PRIVATE);
            SharedPreferences.Editor editor = pref.edit();
            boolean userFirstLogin= pref.getBoolean("key_name1", true);
            if(userFirstLogin)
                position=0;
            else position = 1;
            editor.clear();
            editor.commit();
            switch (position){
                case 0 : return new HomeFragment();
                case 1: return new AboutFragment();
            }
            return null;
        }

        @Override
        public int getCount() {

            return int_items;

        }


        @Override
        public CharSequence getPageTitle(int position) {

            switch (position){
                case 0 :
                    return "Home";
            }
            return null;
        }
    }

}
