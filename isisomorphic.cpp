#include<iostream>
#include<string>
using namespace std;
bool isisomorphic(string str1,string str2){
		int i=0,j=0;
		int l1=str1.length();
		int l2=str2.length();
		if(l1==l2){
			for(i=0;i<l1;i++){
				char c=str1[i];
				char k=str2[i];
				for(j=i+1;j<l1;j++){
					if(!((str1[j]!=c&&str2[j]!=k)||(str1[j]==c&&str2[j]==k)))
						return false;
					}
				}
				return true;
			}
    
    return false;

	
	}
int main(){
	int T;
	cin>>T;
	while(T--){
		string str1;
		string str2;
		cin>>str1>>str2;
		if(isisomorphic(str1,str2))
			cout<<"Yes";
		else 
		   cout<<"No";
		}
	return 0;
}
	
