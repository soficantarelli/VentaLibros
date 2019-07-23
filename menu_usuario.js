/***********************************************************************************
*	(c) Ger Versluis 2000 version 5.411 24 December 2001 (updated Jan 31st, 2003 by Dynamic Drive for Opera7)
*	For info write to menus@burmees.nl		          *
*	You may remove all comments for faster loading	          *		
***********************************************************************************/

	var NoOffFirstLineMenus=10;			// Number of first level items
	var LowBgColor='#9a0000';			// Background color when mouse is not over
	var LowSubBgColor='#9a0000';			// Background color when mouse is not over on subs
	var HighBgColor='#b22727';			// Background color when mouse is over
	var HighSubBgColor='#b22727';			// Background color when mouse is over on subs
	var FontLowColor='white';			// Font color when mouse is not over
	var FontSubLowColor='white';			// Font color subs when mouse is not over
	var FontHighColor='white';			// Font color when mouse is over
	var FontSubHighColor='white';			// Font color subs when mouse is over
	var BorderColor='white';			// Border color
	var BorderSubColor='white';			// Border color for subs
	var BorderWidth=1;				// Border width
	var BorderBtwnElmnts=1;			// Border between elements 1 or 0
	var FontFamily="arial,comic sans ms,technical"	// Font family menu items
	var FontSize=8;				// Font size menu items
	var FontBold=1;				// Bold menu items 1 or 0
	var FontItalic=0;				// Italic menu items 1 or 0
	var MenuTextCentered='center';			// Item text position 'left', 'center' or 'right'
	var MenuCentered='center';			// Menu horizontal position 'left', 'center' or 'right'
	var MenuVerticalCentered='top';		// Menu vertical position 'top', 'middle','bottom' or static
	var ChildOverlap=.2;				// horizontal overlap child/ parent
	var ChildVerticalOverlap=.2;			// vertical overlap child/ parent
	var StartTop=20;				// Menu offset x coordinate
	var StartLeft=1;				// Menu offset y coordinate
	var VerCorrect=0;				// Multiple frames y correction
	var HorCorrect=0;				// Multiple frames x correction
	var LeftPaddng=3;				// Left padding
	var TopPaddng=2;				// Top padding
	var FirstLineHorizontal=1;			// SET TO 1 FOR HORIZONTAL MENU, 0 FOR VERTICAL
	var MenuFramesVertical=1;			// Frames in cols or rows 1 or 0
	var DissapearDelay=1000;			// delay before menu folds in
	var TakeOverBgColor=1;			// Menu frame takes over background color subitem frame
	var FirstLineFrame='navig';			// Frame where first level appears
	var SecLineFrame='space';			// Frame where sub levels appear
	var DocTargetFrame='space';			// Frame where target documents appear
	var TargetLoc='';				// span id for relative positioning
	var HideTop=0;				// Hide first level when loading new document 1 or 0
	var MenuWrap=1;				// enables/ disables menu wrap 1 or 0
	var RightToLeft=0;				// enables/ disables right to left unfold 1 or 0
	var UnfoldsOnClick=0;			// Level 1 unfolds onclick/ onmouseover
	var WebMasterCheck=0;			// menu tree checking on or off 1 or 0
	var ShowArrow=1;				// Uses arrow gifs when 1
	var KeepHilite=1;				// Keep selected path highligthed
	var Arrws=['imagenes/tri.gif',5,10,'imagenes/tridown.gif',10,5,'imagenes/trileft.gif',5,10];	// Arrow source, width and height

function BeforeStart(){return}
function AfterBuild(){return}
function BeforeFirstOpen(){return}
function AfterCloseAll(){return}

// Menu tree
//	MenuX=new Array(Text to show, Link, background image (optional), number of sub elements, height, width);
//	For rollover images set "Text to show" to:  "rollover:Image1.jpg:Image2.jpg"

// los numeros (0,20,138) de cada menu especifican el tamano de cada celda del menu.
Menu1=new Array("Libros","listadoLibros.php","",1,45,125);
	Menu1_1=new Array("Agregar Nuevo Libro","libros.php","",0,35,140);

Menu2=new Array("Año","listadoAnio.php","",1,45,125);
	Menu2_1=new Array("Agregar Año","anio.php","",0,35,140);

Menu3=new Array("Autor","listadoAutores.php","",1,45,125);
	Menu3_1=new Array("Agregar Autor","autores.php","",0,35,140);
	
Menu4=new Array("Genero","listadoGenero.php","",1,45,125);
	Menu4_1=new Array("Agregar Genero","genero.php","",0,35,140);

Menu5=new Array("Editorial","listadoEditorial.php","",1,45,125);
	Menu5_1=new Array("Agregar Editorial","editorial.php","",0,35,140);

Menu6=new Array("Puntos","listadoPuntos.php","",1,45,125);
	Menu6_1=new Array("Agregar Puntos","puntos.php","",0,35,140);

Menu7=new Array("Stock","listadoStock.php","",0,45,125);

Menu8=new Array("Facturas","listadoFactura.php","",1,45,125);
	Menu8_1=new Array("Cargar Facturas","descripciones.php","",0,35,140);

Menu9=new Array("Clientes","listadoClientes.php","",1,45,125);
	Menu9_1=new Array("Agregar Clientes","clientes.php","",0,35,140);

Menu10=new Array("IR AL MENU","index.php","",0,45,125);

	
