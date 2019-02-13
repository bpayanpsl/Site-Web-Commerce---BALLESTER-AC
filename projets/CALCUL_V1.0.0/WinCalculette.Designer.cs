namespace WindowsFormsApplication1
{
    partial class WinCalculette
    {
        /// <summary>
        /// Variable nécessaire au concepteur.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Nettoyage des ressources utilisées.
        /// </summary>
        /// <param name="disposing">true si les ressources managées doivent être supprimées ; sinon, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Code généré par le Concepteur Windows Form

        /// <summary>
        /// Méthode requise pour la prise en charge du concepteur - ne modifiez pas
        /// le contenu de cette méthode avec l'éditeur de code.
        /// </summary>
        private void InitializeComponent()
        {
            this.cbx_Operateur = new System.Windows.Forms.ComboBox();
            this.btn_Calculer = new System.Windows.Forms.Button();
            this.label1 = new System.Windows.Forms.Label();
            this.label2 = new System.Windows.Forms.Label();
            this.label3 = new System.Windows.Forms.Label();
            this.label4 = new System.Windows.Forms.Label();
            this.lbl_Message = new System.Windows.Forms.Label();
            this.Résultat = new System.Windows.Forms.Label();
            this.tbx_Nombre1 = new System.Windows.Forms.TextBox();
            this.tbx_Nombre2 = new System.Windows.Forms.TextBox();
            this.tbx_Resultat = new System.Windows.Forms.TextBox();
            this.SuspendLayout();
            // 
            // cbx_Operateur
            // 
            this.cbx_Operateur.FormattingEnabled = true;
            this.cbx_Operateur.Items.AddRange(new object[] {
            "+",
            "-",
            "x",
            "/"});
            this.cbx_Operateur.Location = new System.Drawing.Point(111, 108);
            this.cbx_Operateur.Name = "cbx_Operateur";
            this.cbx_Operateur.Size = new System.Drawing.Size(83, 21);
            this.cbx_Operateur.TabIndex = 0;
            // 
            // btn_Calculer
            // 
            this.btn_Calculer.Location = new System.Drawing.Point(224, 106);
            this.btn_Calculer.Name = "btn_Calculer";
            this.btn_Calculer.Size = new System.Drawing.Size(75, 23);
            this.btn_Calculer.TabIndex = 1;
            this.btn_Calculer.Text = "Calculer";
            this.btn_Calculer.UseVisualStyleBackColor = true;
            this.btn_Calculer.Click += new System.EventHandler(this.btn_Calculer_Click);
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.BackColor = System.Drawing.SystemColors.ControlLightLight;
            this.label1.Font = new System.Drawing.Font("Palatino Linotype", 9.75F);
            this.label1.Location = new System.Drawing.Point(152, 18);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(178, 18);
            this.label1.TabIndex = 2;
            this.label1.Text = "MA PETITE CALCULATRICE";
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.Font = new System.Drawing.Font("Palatino Linotype", 9.75F);
            this.label2.Location = new System.Drawing.Point(12, 72);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(68, 18);
            this.label2.TabIndex = 3;
            this.label2.Text = "Nombre 1";
            // 
            // label3
            // 
            this.label3.AutoSize = true;
            this.label3.Font = new System.Drawing.Font("Palatino Linotype", 9.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label3.Location = new System.Drawing.Point(13, 116);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(70, 18);
            this.label3.TabIndex = 4;
            this.label3.Text = "Opérateur";
            // 
            // label4
            // 
            this.label4.AutoSize = true;
            this.label4.Font = new System.Drawing.Font("Palatino Linotype", 9.75F);
            this.label4.Location = new System.Drawing.Point(12, 170);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(68, 18);
            this.label4.TabIndex = 5;
            this.label4.Text = "Nombre 2";
            // 
            // lbl_Message
            // 
            this.lbl_Message.AutoSize = true;
            this.lbl_Message.Font = new System.Drawing.Font("Palatino Linotype", 9.75F);
            this.lbl_Message.ForeColor = System.Drawing.Color.Red;
            this.lbl_Message.Location = new System.Drawing.Point(108, 219);
            this.lbl_Message.Name = "lbl_Message";
            this.lbl_Message.Size = new System.Drawing.Size(0, 18);
            this.lbl_Message.TabIndex = 6;
            // 
            // Résultat
            // 
            this.Résultat.AutoSize = true;
            this.Résultat.Font = new System.Drawing.Font("Palatino Linotype", 9.75F);
            this.Résultat.Location = new System.Drawing.Point(347, 72);
            this.Résultat.Name = "Résultat";
            this.Résultat.Size = new System.Drawing.Size(58, 18);
            this.Résultat.TabIndex = 7;
            this.Résultat.Text = "Résultat";
            // 
            // tbx_Nombre1
            // 
            this.tbx_Nombre1.Location = new System.Drawing.Point(93, 65);
            this.tbx_Nombre1.Name = "tbx_Nombre1";
            this.tbx_Nombre1.Size = new System.Drawing.Size(100, 20);
            this.tbx_Nombre1.TabIndex = 8;
            // 
            // tbx_Nombre2
            // 
            this.tbx_Nombre2.Location = new System.Drawing.Point(93, 163);
            this.tbx_Nombre2.Name = "tbx_Nombre2";
            this.tbx_Nombre2.Size = new System.Drawing.Size(100, 20);
            this.tbx_Nombre2.TabIndex = 9;
            // 
            // tbx_Resultat
            // 
            this.tbx_Resultat.Location = new System.Drawing.Point(318, 106);
            this.tbx_Resultat.Name = "tbx_Resultat";
            this.tbx_Resultat.Size = new System.Drawing.Size(100, 20);
            this.tbx_Resultat.TabIndex = 10;
            // 
            // WinCalculette
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.BackColor = System.Drawing.SystemColors.ControlLightLight;
            this.ClientSize = new System.Drawing.Size(452, 266);
            this.Controls.Add(this.tbx_Resultat);
            this.Controls.Add(this.tbx_Nombre2);
            this.Controls.Add(this.tbx_Nombre1);
            this.Controls.Add(this.Résultat);
            this.Controls.Add(this.lbl_Message);
            this.Controls.Add(this.label4);
            this.Controls.Add(this.label3);
            this.Controls.Add(this.label2);
            this.Controls.Add(this.label1);
            this.Controls.Add(this.btn_Calculer);
            this.Controls.Add(this.cbx_Operateur);
            this.Name = "WinCalculette";
            this.Text = "WinCalculette";
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.ComboBox cbx_Operateur;
        private System.Windows.Forms.Button btn_Calculer;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.Label label3;
        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.Label lbl_Message;
        private System.Windows.Forms.Label Résultat;
        private System.Windows.Forms.TextBox tbx_Nombre1;
        private System.Windows.Forms.TextBox tbx_Nombre2;
        private System.Windows.Forms.TextBox tbx_Resultat;
    }
}

