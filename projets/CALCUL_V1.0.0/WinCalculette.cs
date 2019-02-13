using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace WindowsFormsApplication1
{
    public partial class WinCalculette : Form
    {
        public WinCalculette()
        {
            InitializeComponent();
        }

        private void btn_Calculer_Click(object sender, EventArgs e)
        {
            decimal res = 0m;
            if (tbx_Nombre1.Text == "" ||
                tbx_Nombre2.Text == "")
            {
                lbl_Message.Text = "Erreur de calcul.";
            }
            else
                switch (cbx_Operateur.Text)
                {
                    case "+":
                        res = (Convert.ToDecimal(tbx_Nombre1.Text) + Convert.ToDecimal(tbx_Nombre2.Text));
                        res.ToString();
                        break;
                    case "/":
                        res = (Convert.ToDecimal(tbx_Nombre1.Text) / Convert.ToDecimal(tbx_Nombre2.Text));
                        res.ToString();
                        break;
                    case "-":
                        res = (Convert.ToDecimal(tbx_Nombre1.Text) - Convert.ToDecimal(tbx_Nombre2.Text));
                        res.ToString();
                        break;
                    case "x":
                        res = (Convert.ToDecimal(tbx_Nombre1.Text) * Convert.ToDecimal(tbx_Nombre2.Text));
                        res.ToString();
                        break;
                }

            tbx_Resultat.Text = res.ToString();
        }
    }
}

