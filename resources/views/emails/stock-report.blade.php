<!DOCTYPE html>
<html>
<body style="margin:0; padding:0; font-family: 'Poppins', Arial, sans-serif; background-color: #0A0A1A; color: #E0E0FF;">
    <table width="100%" cellspacing="0" cellpadding="0" bgcolor="#0A0A1A">
        <tr>
            <td align="center" style="padding: 30px 10px;">
                <table width="580" cellspacing="0" cellpadding="0" bgcolor="#0A0A1A" style="border: 1px solid #00F5FF; box-shadow: 0 0 20px rgba(151, 71, 255, 0.3);">
                    <tr>
                        <td style="padding: 30px 20px; text-align: center; border-bottom: 1px solid #9747FF;">
                            <img src="https://res.cloudinary.com/ddlxp23kv/image/upload/v1752645176/Screenshot_2025-07-16_085238_kqctzm.png" alt="001" width="180" style="border: 2px solid #00F5FF; padding: 5px; background: rgba(0, 245, 255, 0.1); box-shadow: 0 0 15px rgba(0, 245, 255, 0.4);">
                            <h2 style="margin: 20px 0 0 0; color: #00F5FF; text-transform: uppercase; letter-spacing: 2px; font-size: 22px;">TWO ZEROS AND ONE TEAM</h2>
                        </td>
                    </tr>
                    
                    <tr>
                        <td style="padding: 30px;">
                            <p style="margin: 0 0 20px 0; color: #E0E0FF; line-height: 1.6;">
                                <span style="color: #FF00E5;">⫸ SYSTEM ALERT ⫷</span><br>
                                Please find the attached stockpile report.
                            </p>
                            <table width="100%" cellspacing="0" cellpadding="0" style="margin: 30px 0; background: rgba(10, 10, 26, 0.7); border: 1px dashed #9747FF;">
                                <tr>
                                    <td align="center" style="padding: 25px;">
                                        <p style="margin: 0 0 15px 0; color: #00F5FF; font-size: 12px; letter-spacing: 1px; font-family: monospace;">SECURE ACCESS QR</p>
                                        <img src="{{ $message->embed($qrPath) }}" alt="QR Code" style="max-width: 150px; height: auto; border: 1px solid #FF00E5; padding: 8px; background: white;">
                                    </td>
                                </tr>
                            </table>
                            
                            <table width="100%" cellspacing="0" cellpadding="0" style="margin: 20px 0;">
                                <tr>
                                    <td align="center" style="padding: 10px 0; color: #9747FF; font-family: monospace; font-size: 11px;">
                                        01000100 01000001 01010100 01000001 01011000
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                    <tr>
                        <td style="padding: 20px; text-align: center; border-top: 1px solid #00F5FF; background: rgba(0, 0, 0, 0.3);">
                            <p style="margin: 0; color: #E0E0FF; font-size: 12px;">
                                Regards,<br>
                                <span style="color: #FF00E5; font-weight: bold;">{{ $senderName ?? 'TERNARY ARSENAL' }}</span>
                            </p>
                            <p style="margin: 10px 0 0 0; color: #00F5FF; font-size: 10px; font-family: monospace;">
                                [v3.1.7] • ENCRYPTED CHANNEL
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>