#include <utmpx.h>
#include <stdio.h>
#include <time.h>

int main ()
{
	int i;
	i = _UTX_USERSIZE;
	printf("userszie : %i\n", i);
	i = _UTX_IDSIZE;
	printf("idserszie : %i\n", i);
	i = _UTX_LINESIZE;
	printf("lineszie : %i\n", i);
	i = _UTX_HOSTSIZE;
	printf("hostszie : %i\n", i);
}
